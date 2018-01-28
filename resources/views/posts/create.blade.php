@extends('main')

@section('title', '- مقال جديد')

@section('styles')
  {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<h1>مقال جديد</h1>
<hr>
{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
<div class="form-group">
  {{ Form::label('title', 'عنوان المقال:') }}
  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'اكتب عنوان المقال هنا', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
</div>
<div class="form-group">
  {{ Form::label('slug', 'سلاغ') }}
  {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
</div>
<div class="form-group">
  {{ Form::label('body', 'محتوى المقال:') }}
  {{ Form::textarea('body', null, array('id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'اكتب المقال هنا', 'required' => '', 'minlength' => '150')) }}
</div>
  {{ Form::submit('انشر المقال', array('class' => 'btn btn-primary btn-block')) }}

{!! Form::close() !!}
<br>
@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/parsley-lang/ar.js') !!}
@endsection
