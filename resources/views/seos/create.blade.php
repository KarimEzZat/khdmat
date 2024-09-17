@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($seo) ? 'تعديل السيو' : 'اضافة سيو'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($seo) ? route('seos.update', $seo->id) : route('seos.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($seo))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control"
                           value="{{ isset($seo) ? $seo->author : '' }}">
                    @if($errors->has('author'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('author')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($seo) ? $seo->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control"
                           value="{{ isset($seo) ? $seo->site_name : '' }}">
                    @if($errors->has('site_name'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('site_name')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image_alt">Image Alt</label>
                    <input type="text" name="image_alt" id="image_alt" class="form-control"
                           value="{{ isset($seo) ? $seo->image_alt : '' }}">
                    @if($errors->has('image_alt'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('image_alt')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">الوصف</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                              class="form-control">{{ isset($seo) ? $seo->description : '' }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="keywords">كلمات البحث</label>
                    <textarea name="keywords" id="keywords" cols="5" rows="5"
                              class="form-control">{{ isset($seo) ? $seo->keywords : '' }}</textarea>
                    @if($errors->has('keywords'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('keywords')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="service_id">اسم الصفجة التابع لها السيو</label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option>نوع السيو</option>
                        @if(isset($services))
                            @foreach($services as $service)
                                <option
                                    value="{{$service->id}}" @if (isset($seo, $service, $seo->service) && $seo->service->title == $service->title) {{'selected'}}@else {{''}} @endif>{{ $service->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('service_id'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('service_id')}}</span>
                    @endif
                </div>


                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($seo) ? 'تحديث السيو' : 'رفع السيو' }}">
                        <span>
                            {{ isset($seo) ? 'تحديث السيو' : 'رفع السيو' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
