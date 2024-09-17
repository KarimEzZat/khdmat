@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($service) ? 'تعديل الخدمة' : 'اضافة خدمة'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($service) ? route('services.update', $service->slug) : route('services.store')  }}"
                  method="post">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($service) ? $service->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">رقم الموبايل</label>
                    <input type="number" name="phone" id="phone" class="form-control"
                           value="{{ isset($service) ? $service->phone : '' }}">
                    @if($errors->has('phone'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('phone')}}</span>
                    @endif
                </div>


                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}">
                        <span>
                            {{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
