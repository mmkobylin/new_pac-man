@extends("app")

    @section("title"){{
        "Feel Better"
    }}@endsection

    @section("content")

        @include("partials/title")
        @include("partials/answers")
        @include("partials/links")

    @endsection
