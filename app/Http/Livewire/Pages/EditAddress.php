<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

use App\Models\User;

class EditAddress extends Component
{
    public $profile;
    public string $address, $state, $country, $zip_code;

    public $countries = [
        "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", 
        "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", 
        "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", 
        "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", 
        "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", 
        "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", 
        "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", 
        "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", 
        "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", 
        "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", 
        "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", 
        "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", 
        "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Holy See (Vatican City State)", 
        "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", 
        "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", 
        "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", 
        "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau","Madagascar", "Malawi", "Malaysia", 
        "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", 
        "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Caledonia", 
        "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", 
        "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", 
        "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
        "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", 
        "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", 
        "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", 
        "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", 
        "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", 
        "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", 
        "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
    ];

    public function saveState()
    {
        if ($this->profile) {
            $this->profile->state = $this->state;
            $this->profile->save();
        } else {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->state = $this->state;
            $profile->save();
        }
        redirect('profile/edit-address');
    }

    public function saveAddress()
    {
        if ($this->profile) {
            $this->profile->address = $this->address;
            $this->profile->save();
        } else {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->address = $this->address;
            $profile->save();
        }
        redirect('profile/edit-address');
    }

    public function saveCountry()
    {
        if ($this->profile) {
            $this->profile->country = $this->country;
            $this->profile->save();
        } else {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->country = $this->country;
            $profile->save();
        }
        redirect('profile/edit-address');
    }

    public function saveZip()
    {
        if ($this->profile) {
            $this->profile->zip_code = $this->zip_code;
            $this->profile->save();
        } else {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->zip_code = $this->zip_code;
            $profile->save();
        }
        redirect('profile/edit-address');
    }

    public function mount()
    {
        $this->profile = User::find(auth()->user()->id)->profile;
        $this->fill([
            'address' => $this->profile->address ?? '', 
            'state' => $this->profile->state ?? '', 
            'country' => $this->profile->country ?? '', 
            'zip_code' => $this->profile->zip_code ??''
        ]);
    }

    public function render()
    {
        return view('livewire.pages.edit-address')
        ->extends('layouts.app')->section('content');
    }
}
