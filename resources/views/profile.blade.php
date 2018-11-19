@extends('templates.master')
@section('konten')
<div class="right_col" role="main">

    <div class="">
           <div class="clearfix"></div>
     <div class="row">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        @if (session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif
         
        <table class="table"> 
        <form action="{{url('profile/update')}}" method="post" >
            @csrf
            {{ method_field('PUT') }}
            <tr>
                <td>email</td>
                <td>
                <input type="email" name="email" value="{{ $user->email }}" >
                </td>
            </tr>
            <tr>
                <td>new password</td>
                <td>
                    <input type="password" name="password"  required>
                </td>
            </tr>
            <tr>
                <td>new password</td>
                <td>
                    <input type="password" name="-password" required >
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="save" class="btn btn-primary"></td>
            </tr>
            </form>
        </table>
</div>
</div>
</div>


@endsection
