@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-sections',$quiz) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ url('admin/quizzes/'.$quiz->id.'/sections') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">

        <form autocomplete="off" class="card" action="{{ url('admin/quizzes/'.$quiz->id.'/sections' ) }}" method="post" enctype="multipart/form-data">
          @csrf



          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
          <div class="card-body">
            <div class="row ">
              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.sections.field_title') }} <span>*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="question_number"> {{ __('admin.sections.question_number') }} <span>*</span></label>

                <input type="number" class="form-control" name="question_number" id="question_number" value="{{ old('question_number') }}" required>

                @error('question_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label class="form-label" for="active" class="form-label">{{ __('admin.sections.status') }}</label>
                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="1" type="radio" name="active" checked>
                    <span class="form-check-label"> {{ __('admin.active')}}</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="0" type="radio" name="active">
                    <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                  </label>

                </div>
              </div>
            </div>
            <div class="card-body">

              <div class="card-status-top bg-blue"></div>

              <div class="card" style="margin-top: 20px;" id="divToHide">
                <div class="card-header">
                  <h3> {{ __('admin.quizzes.add_bank_group') }} </h3>
                </div>
                <div class="card-body">
                  <div class="main">
                    <table class=" table data-table data-table-horizontal data-table-highlight">
                      <thead>
                        <tr>
                          <td> {{ __('admin.quizzes.select_bank') }}</td>
                          <td>{{ __('admin.quizzes.random_select') }} </td>

                          <td>{{ __('admin.quizzes.question_number') }} </td>
                        </tr>
                      </thead>
                      <tbody id="instructorstable">
                        <tr>
                          @foreach($bankgroups as $bank)

                          <td>
                            <input type="checkbox" name="banks[]" value="{{ $bank->id}}"> {{ $bank->name }}

                          </td>

                          <td>
                            <select class="select2 form-control randomlist" name="random[]" id="{{$bank->id}}">
                              <option selected disabled>{{ __('admin.select') }}</option>
                              <option value="1">{{ __('admin.yes') }}</option>
                              <option value="0">{{ __('admin.no') }}</option>

                            </select>
                          </td>
                          <td>
                            <input type="number" name="questionNumber[]" id="questionNumber" value="" placeholder="عدد الأسئلة" max="{{$bank->questions()->count()}}" />
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3">
                            <p>
                              <a class="text-primary" id="bankquestion_{{$bank->id}}" style="display:none;" data-bs-toggle="collapse" href="#collapseExample{{$bank->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                إختر الاسئلة
                              </a>

                            </p>
                            <div class="collapse" id="collapseExample{{$bank->id}}">
                              <div class="card card-body">
                                <table class="table card-table">
                                  <tbody>
                                    @foreach ($bank->questions as $question )

                                    <tr>
                                      <td>


                                        <input type="checkbox" name="questions[]" value="{{$question->id}}">
                                        {{ $question->customTitle }}
                                      </td>


                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </td>

                        </tr>
                        @endforeach

                      </tbody>

                    </table>

                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer text-end">
              <div class="d-flex">
                <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
              </div>
            </div>

            <!-- Form End -->


        </form>
      </div>
    </div>
  </div>
</div>





@endsection

@push('scripts')

<script>
  $(document).ready(function() {
    // Get all select elements with the same class name
    const selectElements = $('.randomlist');


    // Add an event listener to each select element
    selectElements.on('change', function() {
      // Get the ID of the select element that triggered the event
      const selectId = this.id;
      const value = this.value;
      console.log("bankquestion_" + selectId);
      if (value == '1') {
        document.getElementById("bankquestion_" + selectId).style.display = 'none';


      } else {
        // If the checkbox is not checked, show the div
        document.getElementById("bankquestion_" + selectId).style.display = 'block';

      }

    });
  });
  $(document).ready(function() {
    $('form').on('submit', function(e) {
      let valid = false;
      let errorMessages = [];

      // Get the total number of questions required
      const totalQuestionNumber = parseInt($('#question_number').val(), 10);
      let totalSelectedQuestions = 0;

      // Check if at least one bank has valid `questionNumber` and `random` options
      const banks = $('input[name="banks[]"]');
      const questionNumbers = $('input[name="questionNumber[]"]');
      const randoms = $('select[name="random[]"]');

      let hasValidBank = false;

      banks.each(function(index) {
        const questionNumber = parseInt($(questionNumbers.get(index)).val(), 10);
        const randomOption = $(randoms.get(index)).val();

        if (randomOption === '1' && questionNumber > 0) {
          hasValidBank = true;
          totalSelectedQuestions += questionNumber; // Accumulate selected questions
        }
      });

      // Validation checks
      if (!hasValidBank) {
        errorMessages.push('At least one bank must have a valid question number and random option selected.');
      }

      if (totalQuestionNumber !== totalSelectedQuestions) {
        errorMessages.push('The total number of questions must match the required number of questions.');
      }

      // Display errors if validation fails
      if (errorMessages.length > 0) {
        e.preventDefault(); // Prevent form submission
        alert(errorMessages.join('\n'));
      } else {
        valid = true;
      }
    });
  });
</script>
@endpush