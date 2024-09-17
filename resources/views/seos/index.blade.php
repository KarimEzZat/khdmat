@extends('layouts.app')

@section('content')
    <div class="mb-3 mt-3 mt-lg-0">
        <a href="{{ route('seos.create') }}" class="primary-btn transition" data-text="اضافة سيو">
            <span>اضافة سيو</span>
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-gear fa-2x mr-3"></i>
            تحسين محركات البحث
        </div>
        <div class="card-body">
            @if($seos->count() > 0)
                <table class="table articles-table">
                    <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>اسم الموقع</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seos as $seo)
                        <tr>
                            <td>{{ Str::limit($seo->title, 50) }}</td>
                            <td>{{ Str::limit($seo->site_name, 50) }}</td>
                            <td>
                                <a href="{{ route('seos.edit', $seo->id) }}" class="primary-btn transition"
                                   data-text="تعديل">
                                    <span>تعديل</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('seos.destroy', $seo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="primary-btn transition red" data-text="حذف">
                                        <span>حذف</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد شيء هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
