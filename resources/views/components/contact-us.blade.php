<section class="conatact-section" id="contactUs" >
    <div class="main-container">
         <div class="row">
            <div class="col-lg-6 ctm-n-padd">
                <div class="contatc-us-form">
                       <h2> {{ __('Contact us') }} </h2>
                       <form id="contactForm" action="{{ route('site.contact.request') }}" method="post">
                            <div class="row">
                                @csrf

                                <div class="col-md-6"> <input type="text" placeholder="{{ __('name') }}" name="name">
                                    <span class="name-error error-text text-danger"></span>
                                </div>

                                <div class="col-md-6"> <input type="text" placeholder="{{ __('email') }}" name="email">
                                    <span class="email-error error-text text-danger"></span>
                                </div>
                                <div class="col-md-6"> <input type="text" placeholder="{{ __('phone') }}" name="phone">
                                    <span class="phone-error error-text text-danger"></span>
                                </div>
                                <div class="col-md-6"> <input type="text" placeholder="{{ __('subject') }}" name="subject">
                                    <span class="subject-error error-text text-danger"></span>
                                </div>

                                <div class="col-12">
                                    <p style="color: #999999;">{{ __("Character Count") }}:  <span id="char-count">0</span> {{ __("of total 255") }}</p>
                                    <textarea placeholder="{{ __('message') }}"  name="message" id="text-input" ></textarea>
                                <span class="message-error error-text text-danger"></span>
                            </div>
                            </div>

                            <button type="submit"> {{ __('submit') }} </button>
                       </form>
                </div>
            </div>
            <div class="col-lg-6 ctm-n-padd">
                <div class="contact-us-info">
                     <h2> {{ __('Contact info') }} </h2>

                     <a href="{{ 'mailto:'.getSetting('email') }}" class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-envelope"></i> </div>
                          <div class="text">
                                <p> {{ __('email') }} </p>
                                <p class="descrip">{{getSetting('email') }}</p>
                          </div>
                     </a>

                     <a href="{{ 'tel:+'.getSetting('phone') }}" class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-phone"></i> </div>
                          <div class="text">
                                <p> {{ __('contact number') }} </p>
                                <p class="descrip">{{ getSetting('phone') }} </p>
                          </div>
                     </a>

                     <a class="contact-item" href="{{ 'https://www.google.com/maps/search/?api=1&query='.getSetting('location')['lat'].','.getSetting('location')['lng'] }}" target="_blank">

                          <div class="icon"> <i class="fa-solid fa-location-dot"></i> </div>
                          <div class="text">
                                <p> {{ __('location') }} </p>
                                <p class="descrip"> {{ getSetting('address') }} </p>
                          </div>
                     </a>
                </div>
            </div>
         </div>
    </div>
 </section>
