@extends('front.layout.auth-master')

@section('content')
    <section class="container-fluid">
        <div class="container">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col-md-6">
                    <h4 class="mb-2 fw-bold text-purple">User Regisition Form</h4>
                    <div class="card border-purple" x-data="register">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="mb-1">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="Email" class="mb-1">Email</label>
                                    <input x-model="email" type="text" name="email" class="form-control" :class="{ 'is-invalid': emailError && email, 'is-valid': !emailError && email }" placeholder="Enter Your Email" @keypress="inputEmail()">
                                    <template x-if="emailError">
                                        <span class="invalid-feedback">Invlid email format.</span>
                                    </template>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password" class="mb-1">Password</label>
                                    <input type="password" name="password" :type="showPassword ? 'text' : 'password'" class="form-control" placeholder="Enter Your Password">
                                    <div class="form-check my-2 float-end clearfix">
                                        <input class="form-check-input" type="checkbox" @click="showPassword= !showPassword " id="flexCheckDefault">
                                        <label class="form-check-label ms-1" for="flexCheckDefault">
                                            Show password
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-purple text-white w-100">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('register', () => ({
                showPassword: false,
                email: '',
                timer: '',
                emailError: false,
                inputEmail() {
                    if (typeof this.timer === 'number') {
                        clearTimeout(this.timer)
                    }
                    this.timer = setTimeout(() => {
                        this.emailRegex();
                    }, 500);
                },
                emailRegex() {
                    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                    if (regex.test(this.email)) {
                        this.emailError = false;
                    } else {
                        this.emailError = true;
                    }
                }

            }))
        })
    </script>
@endsection
