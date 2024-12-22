@extends('site.layouts.app')
@section('title', __('من نحن').'|'.getSetting('site_name_'.app()->getLocale()))


@section('content')
<section class="about-us about-page">
    <div class="main-container">
        <div class="row about-section">
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="about-text">
                        <h2>من نحن</h2>
                        <P>شركة السبك المعدني المحدودة تُعد واحدة من الشركات البارزة في مجال سبك وتشكيل المعادن، متخصصة في تقديم حلول صناعية مبتكرة تدعم احتياجات مختلف القطاعات. تأسست الشركة بهدف توفير منتجات معدنية عالية الجودة تلبي احتياجات السوقين المحلي والدولي، مع الالتزام بتقديم خدمات مميزة تعزز رضا العملاء. نسعى لتأسيس علاقات طويلة الأمد مع شركائنا، مبنية على الثقة والابتكار، مما يُسهم في تطوير القطاع الصناعي ومواكبة أحدث التقنيات العالمية.</P>




                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-img">
                    <img class="about-cover"  src="{{  asset('site')}}/images/about.png" alt="">
                    <div class="img-capction">
                        <p>                            متخصصون في سبك المعادن باستخدام أحدث التقنيات والمعدات
                        </p>
                        <div class="capction-icon-container">
                            <div class="capction-icon">
                                <div class="hummer">

                                    <img class="fire-img" src="{{  asset('site')}}/images/fire.svg" alt="">
                                    <img class="hummer-img" src="{{  asset('site')}}/images/hummer.svg" alt="">
                                </div>
                                <div class="kicked-container">

                                    <img src="{{  asset('site')}}/images/kicked.svg" alt="">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- about us mission -->
<section class="about-mission">
    <div class="main-container">


            <div class="row our-mission">
                <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="mission-container">

                        <div class="about-icon">
                            <img src="{{  asset('site')}}/images/targe.svg" alt="">
                        </div>
                        <h3>قصتنا</h3>
                        <p>رؤيتناان نسعى لتقديم منتجات عالية الجودة لعملائنا الكرام ، مع تقديم خدمة متفوقة وسرعة في تنفيذ الطلبات الخاصة.</p>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission-container">

                        <div class="about-icon">
                            <img src="{{  asset('site')}}/images/eyesvg.svg" alt="">
                        </div>
                        <h3>رؤيتنا</h3>
                        <p>رسالتنا ان نتفاعل بشكل المستمر مع عملائنا لتحسين عمر أجزاء المعدات وزيادة ربحية العمل.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission-container">
                        <div class="about-icon">
                            <img src="{{  asset('site')}}/images/book.svg" alt="">
                        </div>
                        <h3>رسالتنا</h3>
                        <p>بدأت قصتنا حين تأسست شركة ميتال كاستينج في الرياض عام 2013، وهي متخصصة في إنتاج أجزاء عالية المقاومة للاحتكاك باستخدام سبائك حديد الكروم والصلب الأوستنيتي.</p>
                    </div>
                </div>


            </div>





    </div>
</section>

@endsection


