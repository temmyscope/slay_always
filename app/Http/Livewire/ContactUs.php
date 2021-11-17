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
            'nameOfSender' => 'required|string', 'feedback' => 'required|string|max:300',
            'emailOfSender' => 'required|string|email',
        ]);

        $fdb = new ContactUsModel;
        $fdb->type = $this->type;
        $fdb->subject = $this->subject;
        $fdb->feedback = $this->feedback;
        $fdb->sender_name = $this->nameOfSender;
        $fdb->email = $this->emailOfSender;
        $fdb->save();
        session()->flash(
            'message', 'Thanks for your feedback, we will reach out as soon as we can. Stay slaying!'
        );
        $this->reset(['nameOfSender', 'emailOfSender', 'type', 'subject', 'feedback']);
    }

    public function mount()
    {
        $properties = [
            'type' => '', 'subject' => '', 'feedback' => '',
            'nameOfSender' => '', 'emailOfSender' => '',
        ];
        $user = auth()->user();
        if (!is_null($user) && is_numeric($user->id)) {
            $properties['nameOfSender'] = $user->name;
            $properties['emailOfSender'] = $user->email;
        }
        $this->fill($properties);
    }

    public function render()
    {
        return view('livewire.contact-us');
    }

}