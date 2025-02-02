<main   id="main-content" >

    <!--  Header  -->
    <header>
         <div class="top-header">
                <div class="main-container">
                       <div class="fast-delever">
                           <img src="{{ asset('site') }}/images/delever.png" alt="">
                           <p> توصيل مجاني للطلبات فوق 250 ريال داخل الرياض </p>
                       </div>

                       <div class="change-lang">
                           <i class="fa-solid fa-sort-down"></i>
                           <img src="{{ asset('site') }}/images/ar.png" alt="">
                           <p> عربي </p>

                           <div class="change-lang-menu">
                                 <a href="/"> عربي </a>
                                 <a href="/"> انجليزي </a>
                           </div>
                       </div>
                </div>
         </div>

         <div class="serch-section main-container">
              <a href="/" class="logo">
                  <img src="{{ asset('site') }}/images/logo.png" alt="">
              </a>

              <form class="search-input">
                   <input type="text" placeholder="ابحث عن.....">
                   <button type="submit" class="icon">
                           <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.7401 26.75C21.2985 26.75 26.6151 21.4334 26.6151 14.875C26.6151 8.31662 21.2985 3 14.7401 3C8.18173 3 2.86511 8.31662 2.86511 14.875C2.86511 21.4334 8.18173 26.75 14.7401 26.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27.8651 28L25.3651 25.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                   </button>
              </form>

              <div class="search-links">
                   <button id="enableAudio">شغل الاصوات</button>
                   <a href="login.html">
                           <svg width="18" height="24" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9.17269 11.0788C9.0647 11.068 8.93511 11.068 8.81631 11.0788C6.24612 10.9925 4.20508 8.88662 4.20508 6.29482C4.20508 3.64903 6.34331 1.5 8.9999 1.5C11.6457 1.5 13.7947 3.64903 13.7947 6.29482C13.7839 8.88662 11.7429 10.9925 9.17269 11.0788Z" stroke="#333333" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M3.59506 14.7208C0.981661 16.4703 0.981661 19.3213 3.59506 21.0599C6.56482 23.047 11.4352 23.047 14.405 21.0599C17.0184 19.3105 17.0184 16.4595 14.405 14.7208C11.446 12.7446 6.57562 12.7446 3.59506 14.7208Z" stroke="#333333" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                         <p> تسجيل الدخول </p>
                   </a>
                   <a href="favourite.html">
                       <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M12.7549 20.81C12.4149 20.93 11.8549 20.93 11.5149 20.81C8.61489 19.82 2.13489 15.69 2.13489 8.68998C2.13489 5.59998 4.62489 3.09998 7.69489 3.09998C9.51489 3.09998 11.1249 3.97998 12.1349 5.33998C13.1449 3.97998 14.7649 3.09998 16.5749 3.09998C19.6449 3.09998 22.1349 5.59998 22.1349 8.68998C22.1349 15.69 15.6549 19.82 12.7549 20.81Z" stroke="#333333" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>

                         <p> المفضلة </p>
                   </a>
                   <a href="cart.html">
                       <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2.63489 2H4.37489C5.45489 2 6.30489 2.93 6.21489 4L5.38489 13.96C5.24489 15.59 6.53488 16.99 8.17488 16.99H18.8249C20.2649 16.99 21.5249 15.81 21.6349 14.38L22.1749 6.88C22.2949 5.22 21.0349 3.87 19.3649 3.87H6.4549" stroke="#333333" stroke-width="1.35" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M16.885 22C17.5754 22 18.135 21.4404 18.135 20.75C18.135 20.0596 17.5754 19.5 16.885 19.5C16.1947 19.5 15.635 20.0596 15.635 20.75C15.635 21.4404 16.1947 22 16.885 22Z" stroke="#333333" stroke-width="1.35" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M8.88513 22C9.57549 22 10.1351 21.4404 10.1351 20.75C10.1351 20.0596 9.57549 19.5 8.88513 19.5C8.19478 19.5 7.63513 20.0596 7.63513 20.75C7.63513 21.4404 8.19478 22 8.88513 22Z" stroke="#333333" stroke-width="1.35" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M9.63501 8H21.635" stroke="#333333" stroke-width="1.35" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>

                         <p>  السلة </p>
                   </a>
              </div>

              <div class="show-menu">
                  <i class="fa-solid fa-bars"></i>
              </div>
         </div>

         <div class="header-links">
             <div class="main-container">
               <div class="links-container">
                   <a href="/" class="header-link"> <p> الصفحة الرئيسية  </p> </a>
                   <div class="header-link">
                       <p> جميع الاقسام </p>
                       <i class="fa-solid fa-chevron-down"></i>

                       <div class="ctm-menu-custom">
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                       </div>
                   </div>
                   <div class="header-link">
                       <p> الكلاب </p>
                       <i class="fa-solid fa-chevron-down"></i>

                         <div class="ctm-menu-custom">
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                       </div>
                   </div>
                   <div class="header-link">
                       <p> القطط </p>
                       <i class="fa-solid fa-chevron-down"></i>

                         <div class="ctm-menu-custom">
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                       </div>
                   </div>
                   <div class="header-link">
                       <p> طيور وحيوانات </p>
                       <i class="fa-solid fa-chevron-down"></i>

                         <div class="ctm-menu-custom">
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                       </div>
                   </div>
                   <div class="header-link">
                       <p> نباتات الزينة </p>
                       <i class="fa-solid fa-chevron-down"></i>

                         <div class="ctm-menu-custom">
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                           <a href="/"> الرئيسية </a>
                       </div>
                   </div>
                   <a href="{{ route('site.about') }}" class="header-link">
                       <p> من نحن </p>
                   </a>
                   <a href="{{  route('site.contact')}}" class="header-link">
                       <p> تواصل معنا </p>
                   </a>
               </div>
               <div class="header-contact">
                     <div class="icon"> <img src="{{ asset('site') }}/images/contact.png" alt=""> </div>
                     <div class="txt">
                         <p> تواصل معنا </p>
                         <a href="/"> +96658765867586 </a>
                     </div>
               </div>
             </div>
         </div>
    </header>

</main>
