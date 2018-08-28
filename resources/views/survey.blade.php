@extends('layouts.master')

@section('custom_head')
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')

<div class="container">
    <h1 class="my-3">Surveys</h1>
    
    <div class="card m-3">
        <div class="card-body">
            <h5 class="card-title">Surveys</h5>
            <p class="card-text">

                <table class="table table-borderless table-sm table-hover table-responsive-sm">
                    
                    <tbody>

                        @foreach( $surveys as $survey )
                        
                            <survey name="{{ $survey->name }}" surveyid="{{ $survey->id }}" userlist="{{ json_encode($users) }}"></survey>
                        
                        @endforeach 

                    </tbody>
                
                            
                </table>

            </p>

        </div>

    </div>

</div>

@endsection

@section('customjs')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
@endsection