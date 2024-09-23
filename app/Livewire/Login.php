<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $loginMessage = '';

    public function authenticate() {
        $this->validate();

        $valid = \Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($valid) {
            $this->redirectIntended('/dashboard');
        } else {
            $this->loginMessage = 'Incorrect email and/or password';
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
