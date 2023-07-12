<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Models\SeasonPrice;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Pagination\Paginator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SeasonPrices extends Component
{
    use LivewireAlert,AuthorizesRoleOrPermission,WithPagination;

    public $name = 'Season price', $currentPage = 1, $searchTerm;

    public $start_month_day;
    public $end_month_day;
    public $season;
    public $item_id;
    public $updateMode = false;
    public string $disableMessage;

    public function mount()
    {
        $this->authorizeRoleOrPermission('room-edit');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $seasonPrice = SeasonPrice::whereId($id)->first();
        $this->item_id = $seasonPrice->id;
        $this->start_month_day = $seasonPrice->start_month_day;
        $this->end_month_day = $seasonPrice->end_month_day;
        $this->season = $seasonPrice->season;
        $this->disableMessage = ' ';


    }
    protected $rules = [
        'start_month_day' => 'required',
        'end_month_day' => 'required',
        'season' => 'required'
    ];

    private function resetSeasonPriceForm()
    {
        $this->start_month_day = '';
        $this->end_month_day = '';
        $this->season = '';
    }

    private function checkBeforeUpdate() : bool
    {

        $selected = SeasonPrice::whereId($this->item_id)->first();


        //
        $startSeasonDate = Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->start_month_day)->addYear()->toDateString();
        $endSeasonDate = Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->end_month_day)->addYear()->toDateString();
        if ((Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->end_month_day)->toDateString()> Carbon::now()))
        {
            $endSeasonDate = Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->end_month_day)->toDateString();
        }
        if ((Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->start_month_day)->toDateString() > Carbon::now()) ||  $endSeasonDate == Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->end_month_day)->toDateString() )
        {
            $startSeasonDate = Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->start_month_day)->toDateString();
        }
        $singleInterval = CarbonPeriod::create($startSeasonDate,($endSeasonDate))->toArray();

        $updatedStartPrice =  Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$this->start_month_day)->addYear()->toDateString();
        $updatedEndPrice =  Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$this->end_month_day)->addYear()->toDateString();
        if ((Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$this->end_month_day)->toDateString()> Carbon::now()))
        {
            $updatedEndPrice = Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$selected->end_month_day)->toDateString();
        }
        if ((Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$this->start_month_day)->toDateString()) > Carbon::now() ||  $updatedEndPrice == Carbon::createFromFormat('Y-m-d',  Carbon::now()->format('Y').$this->end_month_day)->toDateString() )
        {
            $updatedStartPrice = Carbon::now()->format('Y').$this->start_month_day;
        }
        //
        $startTime = SeasonPrice::orderBy('start_month_day')->pluck('end_month_day','start_month_day')->toArray();

        $startTimeArray = array();
        foreach ($startTime as $key => $sTime){
            $startCurrent = (Carbon::now()->format('Y')+1).$key;
            $endCurrent = (Carbon::now()->format('Y')+1).$sTime;
            if ((((Carbon::now()->format('Y').$sTime))> Carbon::now()))
            {
                $endCurrent = Carbon::now()->format('Y').$sTime;
            }
            if ((((Carbon::now()->format('Y').$key)) > Carbon::now()) ||  $endCurrent == Carbon::now()->format('Y').$sTime )
            {
                $startCurrent = Carbon::now()->format('Y').$key;
            }


            $startTimeArray[Carbon::createFromFormat('Y-m-d', ($startCurrent))->toDateString()] = Carbon::createFromFormat('Y-m-d', ($endCurrent))->toDateString();

        }
        $allArray = array();
        foreach ($startTimeArray as $key =>  $fix){
            $interval = CarbonPeriod::create($key,$fix);
            foreach ($interval as $time){
                array_push($allArray, $time->toDateString());
            }
        }
        $singleArray = array();
        foreach ($singleInterval as $singleTime){
            array_push($singleArray, ($singleTime->toDateString()));
        }

        $newMergedArray = array_diff($allArray,$singleArray);
        if (!in_array($updatedStartPrice,$newMergedArray) && !in_array($updatedEndPrice,$newMergedArray) ){
            return true;
        }

        return false;

    }
    public function updateSeasonPrice()
    {
        $this->validate();

        $seasonPrice = SeasonPrice::whereId($this->item_id)->first();
        $seasonPrice->start_month_day = $this->start_month_day;
        $seasonPrice->end_month_day = $this->end_month_day;
        $seasonPrice->season = $this->season;
        if (self::checkBeforeUpdate()){
            $seasonPrice->update();
            $this->resetSeasonPriceForm();
            $this->updateMode = false;
            $this->alert('success','Season price updated successfully');
            $this->disableMessage = ' ';

            return true;
        }
//        $this->alert('info','Conflict from another season date');

        $this->disableMessage = 'Conflict from another season date';
        return false;

    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function delete($id)
    {
        SeasonPrice::find($id)->delete();
        $this->alert('warning', 'Season price Deleted Successfully');
    }
    public function render()
    {


        $seasons = ['low','middle','high'];
        $items= SeasonPrice::orderBy('start_month_day')->paginate(10);
        return view('livewire.admin.supports.season-prices',compact('seasons','items'))->extends('layouts.admin');
    }
}
