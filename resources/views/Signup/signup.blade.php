{{-- <link href="Userside/css/signup/signup.css" rel="stylesheet"> --}}
@extends('Layout/Signup')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="form">
    <div class="card">
        <div class="row">
            <div class="col-7">
                <img src="https://svgshare.com/i/16AH.svg" alt="logo">
            </div>
            <div class="col-5">
                <div class="card border-0 shadow">
                    <h4 class="mt-1 mb-2">Create Account</h4>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>
                            <input class="form-control mb-2" type="text" name="firstname" value="" placeholder="First Name" required />
                        </div>
                        <div>
                            <input class="form-control mb-2" type="text" name="lastname" value="" placeholder="Last Name" required />
                        </div>
                        <div>
                            <input class="form-control mb-2" type="email" name="email" value="" placeholder="Email Id" required />
                        </div>
                        <div>
                            <input class="form-control mb-3" type="password" name="password" value="" placeholder="Password" required />
                        </div>
                        <div>
                            <input class="form-control mb-3" type="password" name="password_confirmation" value="" placeholder="Confirm Password" required />
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 w-100">Create My Account</button>
                        <p class="mb-2">Already have an account? <a href="#">Login</a></p>
                        <div class="py-3">
                            <p class="align-items-center mb-0 mt-0 justify-content-center line d-flex" style="color: #878787;">OR</p>
                        </div>
                        <div class="w-100">
                            <button type="button" class="btn d-flex gap-1 p-2 w-100 mb-3 justify-content-center border rounded-4">
                                <img src="https://svgshare.com/i/1690.svg">
                                <p class="mb-0">Sign Up with Apple</p>
                            </button>
                            <button type="button" class="btn d-flex gap-2 p-2 w-100 mb-3 justify-content-center border rounded-4">
                                <img src="https://svgshare.com/i/168i.svg">
                                <p class="mb-0">Sign Up with Google</p>
                            </button>
                            <button type="button" class="btn d-flex gap-2 p-2 w-100 justify-content-center border rounded-4">
                                <img src="https://svgshare.com/i/168b.svg">
                                <p class="mb-0">Sign Up with Twitter</p>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
