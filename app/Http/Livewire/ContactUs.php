<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactUs as ContactUsModel;

class ContactUs extends Component
{
    public $nameOfSender, $emailOfSender, $type, $subject, $feedback;

    public function saveFeedback()
    {
        $this->validate([
            'type' => 'required|string|in:complaint,enquiry,suggestion',
            'subject' => 'required|string|in:order,products,website,others',
            'name' => 'required|string', 'email' => 'required|string|email',
            'feedback' => 'required|string|max:300', 
        ]);
        $fdb = new ContactUsModel;
        $fdb->type = $this->type;
        $fdb->subject = $this->subject;
        $fdb->feedback = $this->feedback;
        $fdb->sendername = $this->nameOfSender;
        $fdb->email = $this->emailOfSender;
        $fdb->save();
        session()->flash('message', 'Thanks for your feedback, we will reach back as soon as we can. stay slaying.');
    }

    public function render()
    {
        return view('livewire.contact-us');
    }

}