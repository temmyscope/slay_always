@section('title', 'Edit Profile')
@section('description', 'Welcome to StaySlay - Fashion. Edit Profile')
@section('keywords', 'Stay, Slay, Fashion')

<div>

  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('home') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Edit Profile</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="w-full mt-16 overflow-x-auto lg:overflow-hidden flex">
    <div class="lg:w-3/4 mx-auto flex gap-6 w-full">
      
      @includeIf('layouts.sidebar', ['active' => 'edit-profile'])
        
      <div class="bg-white rounded-md min-w-profie flex-shrink-0">
        <div class="mt-2 text-gray-600 p-1 input-bod w-full">
          <h2 class="text-xl font-medium capitalize">details</h2>
        </div>
        <!-- <div class="w-4/5"> -->
         <form class="p-3 ">
            <div class="grid grid-cols-2 gap-6  justify-between">
              <div class="py-2">
                <label for="name" class="w-8/12 block">First Name</label>
                <input type="text" name="name" id="name" placeholder="enter first name" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2">
                <a href="" class="text-slayText font-bold">Save</a>
              </div>

              <div class="py-2">
                <label for="lname" class="w-8/12 block">Last Name</label>
                <span>
                  <input type="text" name="lname" id="lname" placeholder="enter last name" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2">
                  <a href="" class="text-slayText font-bold">Save</a>
                </span>
              </div>

              <div class="py-2">
                <label for="gend" class="w-full block">Gender</label>
                <select name="gend" id="gend" class="w-9/12 text-gray-800 input-bod py-1 focus:ring-0 focus:outline-none  px-2">
                  <option value="male">Please select one</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="rather not say">Rather not say</option>
                </select>
                <a href="" class="text-slayText font-bold">Save</a>
              </div>

              <div class="py-2">
                <label for="email" class="w-full block">Email</label>
                <span>
                  <input type="email" name="email" id="email" placeholder="sample@gmail.com" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2">
                <a href="" class="text-slayText font-bold">Save</a>
                </span>
              </div>
              
              <div class="py-2">
                <label for="num" class="w-full block">Phone Number</label>
                <input type="tel" name="num" id="num" placeholder="+234 8012345678" class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none px-2">
                <a href="" class="text-slayText font-bold">Save</a>
              </div>

              <div class="py-2">
                <h3 class="font-bold">Newsletter preferences</h3>
                <div class="py-1">
                  <input type="checkbox" name="slay" id="slay" class="mr-1 inline-block relative top-0 w-4">
                  <label for="slay" class="text-gray-900 capitalize">
                    How to Stay Slay - Fashion Tips
                  </label>
                </div>
              </div>

              <div class="col-span-2 text-center mt-4">
                <button class="bg-bgSec text-white active:bg-purple-600 font-bold uppercase text-base hover:bg-slay outline-none focus:outline-none py-2 rounded-lg w-1/2" type="button">
                  Submit
                </button>
              </div>
            </div>
          </form>
        
      </div>
    </div>
  </main>

</div>