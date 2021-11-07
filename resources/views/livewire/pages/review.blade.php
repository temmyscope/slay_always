<div>

  <nav class="w-full">
    <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
      <ul class="flex">
        <li class="underline p-3 font-bold text-xl">
          <a href="{!! route('home') !!}">Home</a>
        </li>
        <li class="p-3 text-gray-400 text-xl">
          <a>Review</a>
        </li>
      </ul>
    </div>
  </nav>

  
  <main class="w-full mt-16 mb-4 overflow-x-scroll lg:overflow-hidden flex">
    <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">
      
      @includeIf('layouts.sidebar', ['active' => 'review'])

      <!--  -->
      <div class="bg-white rounded-md lg:w-4/5 w-full flex-shrink-0">
        <div class="p-2 border-b-2 border-gray-200 border-solid w-full">
          <h3 class="capitalize text-2xl">reviews</h3>
        </div>
        <div class=" p-1 w-full">

        <!-- review page -->
    
          <form class="">
            <div class="px-2 lg:flex bg-gray-200 py-1 rounded-lg">
              <div class="lg:w-1/2">
                <div class="py-3">
                  <label for="country" class="w-full block mb-4">What size did you purchase?</label>
                  <select name="country" id="country" class="w-full text-gray-800 input-rate py-3 rounded-lg focus:ring-0 focus:outline-none  px-2">
                    <option value="male">Please select one</option>
                    <option value="male">XL</option>
                    <option value="female">XXL</option>
                    <option value="rather not say">sm</option>
                    <option value="rather not say">m</option>
                    <option value="rather not say"> L</option>
                  </select>
                </div>

                <div class="py-3 inline-block w-full">
                  <p class="mb-5">Did it fit exactly?</p>
                  <input type="radio" name="rating" id="rating1" class="hidden">
                  <input type="radio" name="rating" id="rating2" class="hidden">
                  <input type="radio" name="rating" id="rating3" class="hidden">

                  <label for="rating1" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate1 m-1">True to size</label>
                  <label for="rating2" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate2 m-1">Runs small</label>
                  <label for="rating3" class="w-28 inline-block p-2 text-center border-solid border-2 border-gray-400 text-gray-700 cursor-pointer rounded-3xl font-bold py-3 lg:mr-3 mr-1 rate3 m-1">Too large</label>
                </div>

                <div>
                  
                  <input type="text" name="review" placeholder="Review title" class="w-full py-2 input-rate rounded-lg focus:ring-0 focus:outline-none  px-2">
                  <label for="" class="block mt-5 py-1">Write your review</label>
                  <textarea name="residential" id="residential" cols="30" rows="5" placeholder="" class="w-full py-2 input-rate rounded-lg focus:ring-0 focus:outline-none  px-2"></textarea>
                  
                  <input type="text" name="review" placeholder="Username" class="w-full py-2 mt-3 input-rate rounded-lg focus:ring-0 focus:outline-none  px-2">
                  <input type="email" name="review" placeholder="Enter email" class="w-full py-2 mt-3 input-rate rounded-lg focus:ring-0 focus:outline-none  px-2">
                </div>
              <button type="submit" class="bg-black text-white font-bold text-base w-full rounded-lg mt-3 outline-none focus:outline-none py-3 hover:bg-slay">Submit Review</button>
            </div>
                
                <div class="lg:w-1/2 lg:mt-0 mt-5">
                  <div class="w-1/2 mx-auto">
        
                    <div class="lg:w-3/5 justify-center">
                      <div class="text-center">
                        <h2 class="font-bold text-3xl py-1">5/5</h2>
          
                        <span class="pr-3 cursor-pointer ">
                          <span class="fas fa-star lg:text-2l text-xs"></span>
                          <span class="fas fa-star lg:text-2l text-xs"></span>
                          <span class="fas fa-star lg:text-2l text-xs"></span>
                          <span class="fas fa-star lg:text-2l text-xs"></span>
                          <span class="fas fa-star lg:text-2l text-xs"></span>
                        </span>
          
                        <p class="py-2">1 review</p>
                      </div>
                      
                    </div>
                  
                    <div class="lg:w-8/12 rounded-lg h-auto">
                      <table class="w-full">
                        <tbody>
                          <th>
                            <tr class="w-full inline-table rounded-lg">
                              <td class="pb-2">5</td>
                              <td class="w-10/12">
                                <div class="w-full bg-gray-100 mb-2 rounded-lg">
                                  <div class="w-full bg-gray-400 lg:py-2 py-1 rounded-lg"></div>
                                </div>
                              </td>
                            </tr>
                            <tr class="w-full inline-table ">
                              <td class="pb-2">4</td>
                              <td class="w-10/12">
                                <div class="w-full bg-gray-100 mb-2 rounded-lg">
                                  <div class="w-3/5 bg-gray-400 lg:py-2 py-1 rounded-lg"></div>
                                </div>
                              </td>
                            </tr>
                            <tr class="w-full inline-table ">
                              <td class="pb-2">3</td>
                              <td class="w-10/12">
                                <div class="w-full bg-gray-100 mb-2 rounded-lg">
                                  <div class="w-2/5 bg-gray-400 lg:py-2 py-1 rounded-lg"></div>
                                </div>
                              </td>
                            </tr>
                            <tr class="w-full inline-table ">
                              <td class="pb-2">2</td>
                              <td class="w-10/12">
                                <div class="w-full bg-gray-100 mb-2 rounded-lg">
                                  <div class="w-1/5 bg-gray-400 lg:py-2 py-1 rounded-lg"></div>
                                </div>
                              </td>
                            </tr>
                            <tr class="w-full inline-table ">
                              <td class="pb-2">1</td>
                              <td class="w-10/12">
                                <div class="w-full bg-gray-100 mb-2 rounded-lg">
                                  <div class="w-1 bg-gray-400 lg:py-2 py-1 rounded-lg"></div>
                                </div>
                              </td>
                            </tr>
                          </th>
                        </tbody>
                      </table>
                    </div>
                  
                  <!-- product purchased -->
                  <div class="w-1/2 lg:mt-8 mt-3 py-1">
                    <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                  </div>

                </div>
              </div>
            </div>
          </form>
     
          <!-- </section> -->

        </div>
        
      </div>
    </div>
  </main>

</div>
