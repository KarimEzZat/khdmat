@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($faq) ? 'تعديل سؤال' : 'اضافة سؤال'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($faq) ? route('faqs.update', $faq->id) : route('faqs.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($faq))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="faq">السؤال</label>
                    <input type="text" name="faq" id="faq" class="form-control"
                           value="{{ isset($faq) ? $faq->faq : '' }}">
                    @if($errors->has('faq'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('faq')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="answer">الإجابة</label>
                    <textarea name="answer" id="answer" cols="5" rows="5"
                              class="form-control">{{ isset($faq) ? $faq->answer : '' }}</textarea>
                    @if($errors->has('answer'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('answer')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="service_id">نوع السؤال</label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option>نوع السؤال</option>
                        @if(isset($services))
                            @foreach($services as $service)
                                <option
                                    value="{{$service->id}}" @if (isset($faq, $service, $faq->service) && $faq->service->title == $service->title) {{'selected'}}@else {{''}} @endif>{{ $service->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('service_id'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('service_id')}}</span>
                    @endif
                </div>


                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($faq) ? 'تحديث السؤال' : 'رفع السؤال' }}">
                        <span>
                            {{ isset($faq) ? 'تحديث السؤال' : 'رفع السؤال' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
