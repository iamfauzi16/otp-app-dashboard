<x-auth-layout title="OTP Page">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" id="card">
                <div class="card-body">
                    <h3 class="text-dark my-3">Verification OTP</h3>
                    <form method="post" action="{{ route('verify.otp') }}">
                        @csrf
                        <div class="form-group">
                            <label for="enter OTP">Enter OTP</label>
                            <input type="text" class="form-control @error('token') is-invalid @enderror" id="token"
                                name="token"placeholder="Input your otp">
                            @error('token')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Verify OTP</button>
                    </form>
    
                    <form method="post" action="{{ route('verify-resend.otp') }}">
                        @csrf
                        <div class="d-flex flex-column justify-content-center align-items-center mt-4">
                            <div>
                                <p>Belum menerima OTP?</p> 
                            </div>
                            <div>
                                <button type="submit" class="btn btn-link">Resend OTP</button>
                            </div>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>