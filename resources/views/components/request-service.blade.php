<section class="contactus" id="requestService">
    <div class="main-container">
        <div class="mlr-auto">
            <div class="abt-header-txt" data-aos="fade-up">{{ __('Service Request Form') }}</div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 mlr-auto" data-aos="fade-up">
                <form id="service_request" action="{{ route('site.services.order.request') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="{{ __('Name') }}" name="name" />
                            <span class="name-error error-text text-danger"></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="{{ __('Email') }}" name="email" />
                            <span class="email-error error-text text-danger"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="number" placeholder="{{ __('Phone Number') }}" name="phone" />
                            <span class="phone-error error-text text-danger"></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="custom-input">
                                <select name="service_id">
                                    <option value="">{{ __('Select a Service') }}</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}"> {{ $service->name }}</option>
                                    @endforeach
                                </select>
                                <div class="arr">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                                <span class="service_id-error error-text text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea placeholder="{{ __('Message') }}" name="message"></textarea>
                            <span class="message-error error-text text-danger"></span>
                        </div>
                    </div>
                    <button type="submit" class="mlr-auto">{{ __('Send') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
