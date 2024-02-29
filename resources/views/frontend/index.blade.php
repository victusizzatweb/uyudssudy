@extends('frontend.app')
@section('content')

<section class="header">
    
  
    <h1>Ayni damda tilimiz :: <b>{{session('locale')}}</b></h1>
    <div class="container">
       <div class="header_title">
        @foreach ($settings as $setting)
            
        {{-- {{$settings}} --}}
        <img src="{{$setting->header_logo}}" alt="">
        <div class="lang">
         <div class="defualt">  <a href="./locale/{{session('locale')}}" class="lang_hover">
             <?php if(session('locale')=='uz'){echo "UZ";}else if(session('locale')=='ru'){echo 'RU';}else if(session('locale')=='en'){echo 'EN';} ?> 
            </a>
         </div> 
         <div class="display">
            @if(session('locale')=='uz')
                <a href="./locale/ru" class="lang_hover">RU</a>
                <a href="./locale/en" class="lang_hover">EN</a>
            @elseif(session('locale')=='ru')
                <a href="./locale/uz" class="lang_hover">UZ</a>
                <a href="./locale/en" class="lang_hover">EN</a>
            @else
                <a href="./locale/uz" class="lang_hover">UZ</a>
                <a href="./locale/ru" class="lang_hover">RU</a>
            @endif
            
           </div>
        </div>
        
        <div class="location">
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.171504458785!2d71.77956247574194!3d40.382891371445155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb83a4e74c1d51%3A0x74f191ca540db19!2siTeach%20Academy!5e0!3m2!1sen!2s!4v1689340915219!5m2!1sen!2s"><img src="{{$setting->location_image}}" alt=""></a>
            <p class="location_title">{{$setting['location_'.session('locale')]}}</p>
        </div>
       </div>
       <div class="header_info">
          <div class="item">
                <div class="info_value">{{$setting->working_time}}</div>
                <div class="info_text">
                    <img src="{{$setting->working_t_image}}" alt="">
                    {{__('words.time')}}
                </div>
          </div>
          <div class="item">
                <div class="info_value">{{$setting->phone}}</div>
                <div class="info_text">
                    <img src="{{$setting->phone_image}}" alt="">
                    {{__('words.phone')}}
                </div>
          </div>
          @endforeach
        
       </div>
    </div>

</section>
<section class="about">
    <div class="container">
        <div class="info_about">
            <div class="about_left">
                <div class="about_title">
                   {{$abouts['title_'.session('locale')]}}
                </div>
                <div class="about_text">
                    {{$abouts['text_'.session('locale')]}}
                </div>
                <a href="#" class="buttom">{{__('words.placing_an_order')}}</a>
                <div class="items">
                    @foreach ($boxes as $box)
                    <div class="item">
                        <div class="item_value">
                           {{$box->value}}
                        </div>
                        <div class="item_text">
                            {{$box['text_'.session('locale')]}}
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
            <div class="about_right">
                    <img src="/storage/about/{{$abouts->image}}" alt="">
            </div>
            
        </div>
        <div class="boxs">
            @foreach ($information as $informat)
            <div class="box">
                <div class="box_image">
                    <img src="/storage/information/{{$informat->image}}" alt="">
                </div>
              
                <div class="box_info">
                    <div class="box_title">
                       {{$informat['title_'.session('locale')]}}
                    </div>
                    <div class="box_text">
                        {{$informat['text_'.session('locale')]}}
                    </div>
                </div>
            </div>
            @endforeach
           
            
        </div>
    </div>
</section>
<section class="Ainfo"> 
     <div class="container">
          <div class="left_info">
            <div class="vidio"><video  src="/storage/aboutInfo/{{$about_infos->vidio}}" controls></video></div>
            <div class="title">
                Videoda kompaniya haqida gapirilgan.
                <span>Davomiyligi: 3:00 min</span>
              </div>
          </div>
        <div class="right">
            <div class="right_title">
                {{$about_infos['title_'.session('locale')]}}
            </div>
            <div class="right_text">
                {{$about_infos['text_'.session('locale')]}}
            </div>
            
           <form action="{{route('frontend.store')}}" method="POST">
            <div class="right_text2">
               {{__('words.consultation')}}
            </div>
            @csrf
            <div class="phone_number"> {{__('words.phone_number')}}</div>
            <input type="text" name="status" style="display: none" value="Bepul konsultatsiya oling!">
            <input type="text" name="phone" placeholder="+998 xxx xx xx">
            <button type="submit" onclick="return confirm('Nomeringizni qoldirmoqchimisiz?')" class="buttom">{{__('words.to_send')}}</button>
           </form>
        </div>
     </div>
</section>

<section class="category">
    <div class="container">
        <nav>
            <div class="title">
               {{__('words.assortiment')}}
            </div>
                <ul  class="links">
                 
                    <li class="link"><a class="{{ request('cat') == ''? 'active':''}}" href="{{route('index')}}">{{__('words.all_of_them')}}</a></li>
                    @foreach ($category as $catigory)
                    <li class="link">
                        <a class="{{$catigory->id == request('cat')? 'active':''}}" href="{{route('category')}}?cat={{$catigory->id}}">{{$catigory['title_'.session('locale')]}}</a>
                    </li>
                    @endforeach
                   
                </ul>
        </nav>
    </div>
        <div class="products">
            <div class="container">
                <div class="top">
                   @if (isset($product[0])&& isset($product[1]) )
                       
                   <div class="product">
                    <img src="/storage/product/{{$product[0]['image']}}" alt="">
                    <div class="title">
                        {{$product[0]['title_'.session('locale')]}}
                    </div>
                  </div>
                 <div class="product">
                    <img src="/storage/product/{{$product[1]['image']}}" alt="">
                    <div class="title">
                        {{$product[1]['title_'.session('locale')]}}
                    </div>
                </div>
              </div>
                       
                   @endif
                <div class="center">
                    @if (isset($product[2])&& isset($product[3]) )
                    <div class="product">
                        <img src="/storage/product/{{$product[2]['image']}}" alt="">
                        <div class="title">
                            {{$product[2]['title_'.session('locale')]}}
                        </div>
                    </div>
                    <div class="product">
                        <img src="/storage/product/{{$product[3]['image']}}" alt="">
                        <div class="title">
                            {{$product[3]['title_'.session('locale')]}}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="buttom_product">
                    @if (isset($product[4])&& isset($product[5]) && isset($product[6]) )
                    <div class="product">
                        <img src="/storage/product/{{$product[4]['image']}}" alt="">
                        <div class="title">
                            {{$product[4]['title_'.session('locale')]}}
                        </div>
                    </div>
                    <div class="buttom_right">
                        <div class="product">
                            <img src="/storage/product/{{$product[5]['image']}}" alt="">
                            <div class="title">
                                {{$product[5]['title_'.session('locale')]}}
                            </div>
                        </div>
                        <div class="product">
                            <img src="/storage/product/{{$product[6]['image']}}" alt="">
                            <div class="title">
                                {{$product[6]['title_'.session('locale')]}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
     </div>
     <div class="container buttom_cat">
        <div class="title">
           <span> * </span>{{__('words.download_text')}}
        </div>
        <div class="buttom">
            <a href="#">{{__('words.download')}}</a>
        </div>
     </div>
</section>
<section class="about_info">
    <div class="container">
        <div class="left">
            @foreach ($order as $item)
            <div class="left_title">
                {{$item['title_'.session('locale')]}}
            </div>
            <div class="left_text">
                {{$item['text_'.session('locale')]}}  
            </div>
            <div class="text">
                {{$item['text2_'.session('locale')]}}
            </div>
                
              
            <form action="{{route('frontend.store')}}" method="POST">
                @csrf
                <input type="text" name="status" style="display: none" value="Mutaxassis orqali sizga kerakli mebel narxini BEPUL xisoblash uchun telefon raqamingizni qoldiring">
                <div class="input_text">{{__('words.name')}}</div>
                <input type="text" name="name" id="" placeholder="(Fakhriyor)">
                <div class="input_text">{{__('words.phone_number')}}</div>
                <input type="text" name="phone" id="" placeholder="+998">
                <button type="submit" style="display: none" class="buttom">Yuborish</button>
            </form>

        </div>
        <div class="right">
            <div class="image">
                <img src="/storage/order/{{$item->image}}" alt="">
            </div>
        </div>
        @endforeach
    </div>
</section>
<div class="container">
    <div class="container buttom_cat2">
        <div class="buttom">
            <a href="#">{{__('words.download')}}</a>
        </div>
        <div class="title">
           <span>* </span>{{__('words.download_consultation')}}
        </div>
        
     </div>
</div>
<div class="information">
    <div class="container">
        <div class="title">{{__('words.information_title')}}</div>

        <div class="boxs">
            
            @foreach ($informationAboutU   as $information)
            <div class="box">
                <div class="image">
                    <img src="/storage/informationAboutUs/{{$information->image}}" alt="">
                </div>
               <div class="title_gr">
                <div class="title">{{$information['title_'.session('locale')]}}</div>
                <div class="text">{{$information['text_'.session('locale')]}}</div>
               </div>
            </div>
            @endforeach
           
            
           
        </div>
    </div>
</div>
<div class="gallery">
    <div class="container">
        <div class="products">
            <div class="product_top">
               <div class="left">
                <div class="top">
                    @if (isset($gallery[0])&& isset($gallery[1]) )
                    <img src="/storage/gallery/{{$gallery[0]['image']}}" alt="">
                    <img src="/storage/gallery/{{$gallery[1]['image']}}" alt="">
                    @endif
                </div>
                <div class="pbuttom">
                    @if (isset($gallery[2]) )
                    <img src="/storage/gallery/{{$gallery[2]['image']}}" alt="">
                    @endif
                    <div class="box">
                        @foreach ($consultation as $item)
                        <div class="title">{{$item['title_'.session('locale')]}}</div>
                        <div class="text">{{$item['text_'.session('locale')]}}</div>
                        <a download="" href="/storage/consultation/{{$item->image}}" class="buttom">{{__('words.download')}}</a>
                        @endforeach
                        
                    </div>
                </div>
               </div>
                <div class="right">
                    @if (isset($gallery[3])&& isset($gallery[4]) )
                    <img src="/storage/gallery/{{$gallery[3]['image']}}" alt="">
                    <img src="/storage/gallery/{{$gallery[4]['image']}}" alt="">
                    @endif
                </div>

            </div>
            <div class="product_buttom">
                <div class="left">
                    @if (isset($gallery[5]) )
                    <img src="/storage/gallery/{{$gallery[5]['image']}}" alt="">
                    @endif
                </div>
                <div class="right">
                    @if (isset($gallery[6])&& isset($gallery[7]) )
                    <img src="/storage/gallery/{{$gallery[6]['image']}}" alt="">
                    <img src="/storage/gallery/{{$gallery[7]['image']}}" alt="">
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<div class="comments">
    <div class="container">
        <div class="title1">{{__('words.commentary')}}</div>
        <div class="comment_boxs">
            <div class="comment_top">
               
                <div class="comment_box">
                    @if (isset($comments[0])&& isset($comments[1]) )
                    <div class="comment_box_top">
                        <img src="/front/image/Ellipse 6 (1).png" alt="">
                        <div class="box_info">
                            
                            <div class="title"> {{$comments[0]['title_'.session('locale')]}}</div>
                            <div class="name">{{$comments[0]['name']}}</div>
                        </div>

                    </div>
                    <div class="text">{{$comments[0]['text_'.session('locale')]}} </div>

                </div>
               
                <div class="comment_box">
                    <div class="comment_box_top">
                        <img src="/front/image/Ellipse 6 (1).png" alt="">
                        <div class="box_info">
                            <div class="title">{{$comments[1]['title_'.session('locale')]}}</div>
                            <div class="name">{{$comments[1]['name']}}</div>
                        </div>

                    </div>
                    <div class="text">{{$comments[1]['text_'.session('locale')]}}</div>

                </div>

            </div>
            @endif
            <div class="comment_buttom">
                @if (isset($comments[2])&& isset($comments[3]) )
                <div class="comment_box">
                    <div class="comment_box_top">
                        <img src="/front/image/Ellipse 6 (1).png" alt="">
                        <div class="box_info">
                            <div class="title">{{$comments[2]['title_'.session('locale')]}}</div>
                            <div class="name">{{$comments[2]['name']}}</div>
                        </div>

                    </div>
                    <div class="text">{{$comments[2]['text_'.session('locale')]}} </div>

                </div>
                <div class="comment_box">
                    <div class="comment_box_top">
                        <img src="/front/image/Ellipse 6 (1).png" alt="">
                        <div class="box_info">
                            <div class="title">{{$comments[3]['title_'.session('locale')]}}</div>
                            <div class="name">{{$comments[3]['name']}}</div>
                        </div>

                    </div>
                    <div class="text">{{$comments[3]['text_'.session('locale')]}} </div>

                </div>
           @endif
            </div>
        </div>
    </div>
</div>
<div class="advice">
    <div class="container">
        <div class="title">{{__('words.furniture_consultation')}}</div>
       <form action="{{route('frontend.store')}}" method="POST">
        @csrf
        <input type="text" name="status" style="display: none" value="Mebel borasida bepul maslahat olish">

        <div class="input_gr">
            <label for="">{{__('words.name')}}</label>
            <input type="text" name="name" id="" placeholder="(Fakhriyor)">
        </div>
        <div class="input_gr">
            <label for="">{{__('words.phone_number')}}</label>
            <input type="text" name="phone" id="" placeholder="+998">
        </div>
        <button type="submit"  class="buttom2">{{__('words.to_send')}}</button>
       </form>
    </div>
</div>
<div class="partners">
    <div class="container">
        <div class="title">
           {{__('words.sponsors')}}
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="/front/image/Rectangle 48.png" alt=""></div>
              <div class="swiper-slide"><img src="/front/image/Rectangle 49.png" alt=""></div>
              <div class="swiper-slide"><img src="/front/image/Rectangle 50.png" alt=""></div>
              <div class="swiper-slide"><img src="/front/image/Rectangle 51.png" alt=""></div>
              <div class="swiper-slide"><img src="/front/image/Rectangle 48.png" alt=""></div>
              <div class="swiper-slide"><img src="/front/image/Rectangle 49.png" alt=""></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
    </div>
</div>

<section class="about_info2">
    <div class="container">
        <div class="left2">
            <div class="left_title">
                {{__('words.question')}}
            </div>
            <div class="left_text">
                {{__('words.question_text')}}
            </div>
           

            <form action="{{route('frontend.store')}}" method="POST">
                @csrf
                <input type="text" name="status" style="display: none" value="Savolingiz qoldimi?">
                <div class="input_text">{{__('words.name')}}</div>
                <input type="text" name="name" id="" placeholder="(Fakhriyor)">
                <div class="input_text">{{__('words.phone_number')}}</div>
                <input type="text" name="phone" id="" placeholder="+998">
                <button type="submit"  class="buttom">{{__('words.to_send')}}</button>
               </form>
        </div>
        <div class="right2">
            <div class="image2">
             @foreach ($settings as $setting)
             <div class="iframe">
                {!!$setting->map!!}
             </div>
            @endforeach    
            </div>
                
        </div>
    </div>
</section>
<section class="footer">
    <div class="container">
        @foreach ($settings as $setting)
            
       
       <div class="header_title">
        <div class="header_logo">
            <img class="logo" src="{{$setting->header_logo}}" alt="">
            <div class="text">Loyihalashtirildi <span>I-Teach Programming</span></div>
        </div>
        
        <div class="location">
            <img src="/front/image/Frame.png" alt="">
            <p class="location_title">{{$setting['location_'.session('locale')]}}</p>
        </div>
       </div>
       <div class="header_info">
          <div class="item">
                <div class="info_value">{{$setting->working_time}}</div>
                <div class="info_text">
                    <img src="{{$setting->working_t_image}}" alt="">
                    {{__('words.time')}}
                </div>
          </div>
          <div class="item">
                <div class="info_value">{{$setting->phone}}</div>
                <div class="info_text">
                    <img src="{{$setting->phone_image}}" alt="">
                    {{__('words.phone')}}
                </div>
          </div>
       </div>
       @endforeach
    </div>

</section>
    
@endsection
