@extends('layouts.master')

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

                                        <survey name="{{ $survey->name }}" survey-id="{{ $survey->id }}"></survey>
                                        
                                    @endforeach 

                                </tbody>
                            
                                        
                            </table>

                        </p>

        </div>

    </div>

</div>

@endsection

@section('customjs')
    <script src="/js/app.js"></script>
@endsection