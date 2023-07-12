<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ChangePasswordComponent extends Component
{
    use LivewireAlert;
    public $password;

    public $current_hashed_password;
    public $current_password_for_email;
    public $current_password;
    public $password_confirmation;

    protected function rules()
    {
        $params = [
            'password' => 'nullable|min:6|different:current_password',
            'password_confirmation' => 'sometimes|same:password',
        ];

        if (!empty($this->password))
        {
            $params['current_password'] = ['required', 'customPassCheckHashed:'.$this->current_hashed_password];
        }

        return $params;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules());
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);

        $this->current_hashed_password = $model->password;
    }
    public function save()
    {
        $this->validate();
        $data = [];

        // We will check if there are any changes in the fields

        if (!empty($this->password)) {
            $data = array_merge($data, ['password' => Hash::make($this->password)]);
        }

        if(count($data)) {
            User::find($this->userId)->update($data);
            $this->alert('success', 'Password has been updated successfully');
        }
    }
    public function render()
    {
        return <<<'blade'
            <div>

            <style>
            .mainDiv {
                display: flex;
                min-height: 100%;
                align-items: center;
                justify-content: center;
                background-color: #f9f9f9;
                font-family: 'Open Sans', sans-serif;
              }
             .cardStyle {
                width: 500px;
                border-color: white;
                background: #fff;
                padding: 36px 0;
                border-radius: 4px;
                margin: 30px 0;
                box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
              }
            #signupLogo {
              max-height: 50px;
              margin: auto;
              display: flex;
              flex-direction: column;
            }
            .formTitle{
              font-weight: 600;
              margin-top: 20px;
              color: #2F2D3B;
              text-align: center;
            }
            .inputLabel {
              font-size: 12px;
              color: #555;
              margin-bottom: 6px;
              margin-top: 24px;
            }
              .inputDiv {
                width: 70%;
                display: flex;
                flex-direction: column;
                margin: auto;
              }
            input {
              height: 40px;
              font-size: 16px;
              border-radius: 4px;
              border: none;
              border: solid 1px #ccc;
              padding: 0 11px;
            }
            input:disabled {
              cursor: not-allowed;
              border: solid 1px #eee;
            }
            .buttonWrapper {
              margin-top: 40px;
            }
            .submitButton {
                width: 70%;
                height: 40px;
                margin: auto;
                display: block;
                color: #fff;
                background-color: #0000005b ;
                border-color: #0000005b ;
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
                box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
                border-radius: 4px;
                font-size: 14px;
                cursor: pointer;
            }
            .submitButton>span{
                color: #ffffff
            }

            .submitButton:disabled,
            button[disabled] {
              border: 1px solid #cccccc;
              background-color: #cccccc;
              color: #666666;
            }

            .item_logo{
                filter: brightness(0) saturate(100%) invert(16%) sepia(81%) saturate(1251%) hue-rotate(173deg) brightness(98%) contrast(106%);
            }

            #loader {
              position: absolute;
              z-index: 1;
              margin: -2px 0 0 10px;
              border: 4px solid #f3f3f3;
              border-radius: 50%;
              border-top: 4px solid #666666;
              width: 14px;
              height: 14px;
              -webkit-animation: spin 2s linear infinite;
              animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            </style>
                <div class="mainDiv">
                  <div class="cardStyle">
                    <form wire:submit.prevent="save" id="signupForm">

                     
                      <h2 class="formTitle">
                        Login to your account
                      </h2>

                    <div class="inputDiv">
                      <label class="inputLabel" for="password">Current Password</label>
                      <input type="password" wire:model="current_password" id="password" required>
                       @if ($errors->has('current_password'))
                            <p style="color: red">{{$errors->first('current_password')}}</p>
                        @endif
                    </div>

                    <div class="inputDiv">
                      <label class="inputLabel" for="confirmPassword">Password</label>
                      <input type="password" id="confirmPassword" wire:model="password">
                      @if ($errors->has('password'))
                            <p style="color: red">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="inputDiv">
                      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                      <input type="password" id="password_confirmation" wire:model="password_confirmation">
                      @if ($errors->has('password_confirmation'))
                            <p style="color: red">{{$errors->first('password_confirmation')}}</p>
                        @endif
                    </div>
                    <div class="buttonWrapper">
                      <button type="submit" id="submitButton"  class="submitButton pure-button pure-button-primary">
                        <span>Update</span>
                      </button>
                    </div>

                  </form>
                  </div>
                </div>
            </div>
        blade;
    }
}
