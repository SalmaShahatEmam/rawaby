<section class="conatact-section" id="contactUs" >
    <div class="main-container">
         <div class="row">
            <div class="col-lg-6 ctm-n-padd">
                <div class="contatc-us-form">
                       <h2> تواصل معنا </h2>
                       <form id="contactForm" action="{{ route('site.contact.request') }}" method="post">
                            <div class="row">
                                @csrf

                                <div class="col-md-6"> <input type="text" placeholder="الاسم" name="name">
                                    <span class="name-error error-text text-danger"></span>

                                </div>

                                <div class="col-md-6"> <input type="text" placeholder="البريد الالكتروني" name="email">
                                    <span class="email-error error-text text-danger"></span>
                                </div>
                                <div class="col-md-6"> <input type="text" placeholder="رقم الهاتف" name="phone">
                                    <span class="phone-error error-text text-danger"></span>
                                </div>
                                <div class="col-md-6"> <input type="text" placeholder="الموضوع" name="subject">
                                    <span class="subject-error error-text text-danger"></span>
                                </div>

                                <div class="col-12"> <textarea placeholder="الرسالة"  name="message">

                                </textarea>
                                <span class="message-error error-text text-danger"></span>
                            </div>
                            </div>

                            <button type="submit" > إرسال </button>
                       </form>
                </div>
            </div>
            <div class="col-lg-6 ctm-n-padd">
                <div class="contact-us-info">
                     <h2> بيانات التواصل </h2>

                     <div class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-envelope"></i> </div>
                          <div class="text">
                                <p> البريد الالكتروني </p>
                                <p class="descrip"> MetalPulse@gmail.com </p>
                          </div>
                     </div>

                     <div class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-phone"></i> </div>
                          <div class="text">
                                <p> رقم التواصل </p>
                                <p class="descrip"> +9625564565468 </p>
                          </div>
                     </div>

                     <div class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-location-dot"></i> </div>
                          <div class="text">
                                <p> موقعنا </p>
                                <p class="descrip">   المنطقة الصناعية - شارع 10، المدينة، الدولة  </p>
                          </div>
                     </div>

                     <div class="contact-item">
                          <div class="icon"> <i class="fa-solid fa-globe"></i> </div>
                          <div class="text">
                                <p> السبك المعدني </p>
                                <p class="descrip"> MetalPulse.com </p>
                          </div>
                     </div>


                </div>
            </div>
         </div>
    </div>
 </section>
