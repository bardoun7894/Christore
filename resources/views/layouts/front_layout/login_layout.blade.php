<link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<div class="form">
    <div class="login-form">
        <a  href="#" class="form-cancel"><i class='bx bx-x'></i></a>
        <strong>{{ __('messages.login') }}</strong>
        <form action="#">
            <input  type="email" name="email" placeholder="Example@email.com" >
            <input  type="password"  name="password" @if($language=="ar") style="direction: rtl" @endif placeholder="{{__('messages.password')}}"   >
            <input  type="submit" value="{{__('messages.login')}} ">
        </form>
        <div class="form-btns">
            <a href="#" class="forget">{{__('messages.forgetـpassword')}}</a>
            <a href="#" class="sign-up-btn">{{__('messages.create_account')}}</a>
        </div>
    </div>

    <div class="register-form">
        <a  href="#" class="form-cancel"><i class='bx bx-x'></i></a>
        <strong>{{__('messages.sign_up')}}</strong>

        <form action="#">
            <input  type="text" name="email" @if($language=="ar") style="direction: rtl" @endif placeholder="{{__('messages.full_name')}}">
            <input  type="text" name="mobile"  @if($language=="ar") style="direction: rtl" @endif placeholder="{{__('messages.number_phone')}}" >
            <input  type="email" name="email"  placeholder="Example@email.com" >
            <input  type="password"  name="password"  @if($language=="ar") style="direction: rtl" @endif placeholder="{{__('messages.password')}}"   >
            <input  type="password"  name="confirm"  @if($language=="ar") style="direction: rtl" @endif placeholder="{{__('messages.confirm_password')}}"   >
            <input  type="submit" value="{{__('messages.sign_up')}}">
        </form>
        <div class="form-btns">
            <a href="#" class="already-have-account">{{__('messages.you_have_account')}}</a>
        </div>
    </div>
</div>

