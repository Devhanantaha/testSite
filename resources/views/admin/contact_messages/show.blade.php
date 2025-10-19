@extends('admin.layouts.master')
@section('title', __('admin.contacts.show'))
@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('contacts.show', $contact) }}
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> {{ __('admin.back_to_list') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ __('admin.contacts.show_message_details') }}</h3>
      </div>

      <div class="card-body" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.contacts.name') }}:</label>
            <div>{{ $contact->name }}</div>
          </div>
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.contacts.email') }}:</label>
            <div>{{ $contact->email }}</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.contacts.phone') }}:</label>
            <div>{{ $contact->phone ?? __('admin.not_available') }}</div>
          </div>
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.contacts.subject') }}:</label>
            <div>{{ $contact->subject }}</div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12">
            <label class="fw-bold">{{ __('admin.contacts.message') }}:</label>
            <div class="border rounded p-3 bg-light">
              {{ $contact->message }}
            </div>
          </div>
        </div>

        @if(isset($contact->created_at))
        <div class="row">
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.created_at') }}:</label>
            <div>{{ $contact->created_at->format('Y-m-d H:i') }}</div>
          </div>
          <div class="col-md-6">
            <label class="fw-bold">{{ __('admin.updated_at') }}:</label>
            <div>{{ $contact->updated_at->format('Y-m-d H:i') }}</div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
