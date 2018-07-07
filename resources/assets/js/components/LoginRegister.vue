<template>
    <li :class="{dropdown: !!auth}">
        <a class="login-btn" href="javascript:" v-if="!auth" @click="showModal = 'login'; initReCaptcha()"><img src="/images/login.png"> {{ logintext }}</a>

        <a v-if="!!auth" href="#" class="dropdown-toggle auth-anchor" data-toggle="dropdown" role="button" aria-expanded="false">
            <!--<img class="img-circle" width="20" :src="'/'+auth.avatar" :alt="auth.name + ' avatar'">--> {{ auth.name
            }} <span class="caret"></span>
        </a>
        <ul v-if="!!auth" class="dropdown-menu auth-icons" role="menu">
            <li v-if="!homePage"><a href="javascript:" @click="loadDashboard"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
            <li><a href="/dashboard/settings"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
            <!--<li><a href="javascript:" @click="showModal = 'password'"><i class="fa fa-key fa-fw"></i> Change Password</a></li>-->
            <!--<li><a href="javascript:" @click="showModal = 'profile'"><i class="fa fa-user-o fa-fw"></i> Update Profile</a></li>-->
            <li>
                <a :href="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-fw"></i> Logout
                </a>

                <form id="logout-form" :action="logout" method="POST" style="display: none;">
                    <input name="_token" :value="token" type="hidden">
                </form>
            </li>
        </ul>

        <modal v-if="showModal == 'login'" @close="showModal = ''">
            <div slot="body">
                <h3 class="text-center">Welcome back! Please Sign in</h3>
                <hr class="colorgraph">
                <br>

                <form method="POST" :action="login" @submit.prevent="verifyCaptcha">
                    <input name="_token" :value="token" type="hidden">

                    <div class="input-group margin-bottom-10">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group margin-bottom-10">
                        <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                    </div>


                    <div id="g-recaptcha" class="text-center" render="explicit" :data-sitekey="captchakey"></div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in fa-fw"></i> Login</button>


                    <div class="checkbox">
                        <label class="pull-left">
                            <input type="checkbox" name="remember"> Remember me
                        </label>

                        <a class="pull-right forgot-link" @click="switchModal('forget')" href="javascript:">Forgot Your Password?</a>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>

            <div slot="footer">
                <button type="button" class="btn  btn-default btn-lg btn-block" @click="switchModal('signup')"><i class="fa  fa-user-circle-o fa-fw"></i> Create an Account </button>
            </div>

        </modal>

        <modal v-if="showModal == 'signup'" @close="showModal = ''">
            <div slot="body">
                <h3 class="text-center">Registration</h3>
                <hr class="colorgraph">
                <br>

                <form method="POST" :action="signup" @submit.prevent="registerForm">
                    <input name="_token" :value="token" type="hidden">

                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" name="password_confirmation" placeholder="Password confirmation" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group eth-input">
                            <input type="text" class="form-control input-lg" name="ethwalet" placeholder="Ethereum address" @focusout="checkETHAddress" required>
                            <div class="input-group-addon text-danger"><i class="fa" :class="isETHVerified?'fa-check':'fa-remove'"></i></div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="terms" value="1" required> I have read and agree with <a target="_blank" href="/terms-and-conditions">Token Sale Terms</a>.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-plus fa-fw"></i> Registration</button>
                </form>
            </div>

            <div slot="footer">
                <button type="button" class="btn btn-default btn-lg btn-block" @click="switchModal('login')"><i class="fa fa-sign-in fa-fw"></i> Login</button>
            </div>
        </modal>

        <modal v-if="showModal == 'forget'" @close="showModal = ''">
            <div slot="body">
                <h1 class="text-center">Reset Password</h1>
                <hr class="colorgraph">
                <br>

                <form method="POST" :action="forget" @submit.prevent="postForm">
                    <input name="_token" :value="token" type="hidden">

                    <div class="form-group">
                        <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-plus fa-fw"></i> Send Password Reset Link</button>
                </form>
            </div>

            <div slot="footer">
                <button type="button" class="btn btn-default btn-lg btn-block" @click="switchModal('login')"><i class="fa fa-sign-in fa-fw"></i> Login</button>
            </div>
        </modal>

        <modal v-if="showModal == 'profile'" @close="showModal = ''">
            <div slot="body">
                <h1 class="text-center" :class="{'text-primary': homePage}">Update your profile</h1>
                <hr>

                <form @submit.stop.prevent="profileFormSubmit">
                    <div class="form-group">
                        <label for="inputName">Name <span class="text-danger">*</span></label>
                        <input type="text" id="inputName" class="form-control" name="name" :value="auth.name" placeholder="Put your complete name" required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" :value="auth.email" disabled>
                    </div>

                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" id="inputUsername" class="form-control" name="username" :value="auth.username" placeholder="Enter your username">
                    </div>

                    <div class="form-group">
                        <label for="inputCompany">Company</label>
                        <input type="text" id="inputCompany" class="form-control" name="company" :value="auth.company" placeholder="Enter your company name">
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-o fa-fw"></i> Update Profile</button>
                </form>
            </div>
        </modal>

        <modal v-if="showModal == 'avatar'" @close="showModal = ''">
            <div slot="body">
                <h1 class="text-center" :class="{'text-primary': homePage}">Update your profile picture</h1>
                <hr>

                <form @submit.stop.prevent="avatarFormSubmit">

                    <div class="text-center">
                        <img class="img-circle img-thumbnail" width="50%" :src="runtimeAvatar" :alt="auth.name + ' avatar'">
                    </div>

                    <div class="form-group">
                        <label for="inputAvatar">Profile Image <span class="text-danger">*</span></label>
                        <input class="image-select" type="file" id="inputAvatar" name="avatar" @change="processFile" required>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-picture-o fa-fw"></i> Update Profile Picture</button>
                </form>
            </div>
        </modal>

        <modal v-if="showModal == 'password'" @close="showModal = ''">
            <div slot="body">
                <h1 class="text-center" :class="{'text-primary': homePage}">Update your password</h1>
                <hr>

                <form @submit.stop.prevent="passwordFormSubmit">

                    <div class="form-group">
                        <label for="inputCurrentPassword">Current Password <span class="text-danger">*</span></label>
                        <input type="text" id="inputCurrentPassword" class="form-control" name="current" placeholder="Put your old password" required>
                    </div>

                    <div class="form-group">
                        <label for="inputNewPassword">New Password <span class="text-danger">*</span></label>
                        <input type="text" id="inputNewPassword" class="form-control" name="password" placeholder="Put your new password" required>
                    </div>

                    <div class="form-group">
                        <label for="inputConfirmPassword">Confirm Password <span class="text-danger">*</span></label>
                        <input type="text" id="inputConfirmPassword" class="form-control" name="password_confirmation" placeholder="Confirm your new password" required>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-key fa-fw"></i> Change Password</button>
                </form>
            </div>
        </modal>
    </li>
</template>

<script>
    let ethereumAddress = require('ethereum-address');

    export default {
        props: ['token', 'login', 'logintext', 'signup', 'forget', 'logout', 'captchakey'],

        data() {
            return {
                auth: null,
                showModal: '',
                avatar: '',
                runtimeAvatar: '',
                recaptchaId: '',
                isETHVerified: false,
            };
        },

        computed: {
            homePage() {
                let isDashboard = false;
                window.location.href.split('/').filter(function (item) {
                    if (item === 'dashboard')
                        isDashboard = true;
                });
                return isDashboard;
            }
        },

        mounted() {
            this.prepareComponent();
        },

        methods: {
            initReCaptcha() {
                setTimeout(() => {
                    if (window.grecaptcha)
                        this.recaptchaId = grecaptcha.render('g-recaptcha', {sitekey: this.captchakey});
                }, 200);
                this.isETHVerified = false;
            },

            prepareComponent() {
                $('#sideLoader').show();
                axios.get('/api/user').then(r => {
                    this.auth = r.data;
                    $('#sideLoader').hide();
                });
            },

            loadDashboard() {
                window.location.href = '/dashboard/home';
            },

            switchModal(modal) {
                this.showModal = '';
                setTimeout(() => {
                    this.showModal = modal;
                    if (modal === 'login')
                        this.initReCaptcha();
                }, 300);
            },

            checkETHAddress(e) {
                this.isETHVerified = ethereumAddress.isAddress(e.target.value);
//                axios.post('/api/verify/eth/address', {ethwalet: e.target.value}).then(r => {
//                    this.isETHVerified = r.data.address;
//                });
            },

            registerForm(e) {
                if (!this.isETHVerified) {
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0">Ethereum address is not valid.</p></div>'
                    }).show();

                    return false;
                }

                this.postForm(e);
            },

            verifyCaptcha(e) {
                let g_recaptcha_response = grecaptcha.getResponse(this.recaptchaId);
                if (g_recaptcha_response.length === 0) {
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0">Please check the captcha form</p></div>'
                    }).show();

                    return false;
                }

                this.postForm(e);
            },

            postForm(e) {
                let $form = $(e.target);
                let $spin = $('#vueModalSpinner').show();
                let data = {};

                $form.find('.vue-error').remove();

                $form.serializeArray().filter(function (item) {
                    if (item.value)
                        data[item.name] = item.value;
                });

                axios.post($form.attr('action'), data).then(r => {
                    if (typeof r.data === 'object') {
                        new Noty({
                            timeout: false,
                            type: r.data.type,
                            progressBar: false,
                            text: '<div><p class="m-0">' + r.data.status + '</p></div>',
                        }).show();
                        $spin.hide();
                        this.showModal = '';
                    } else
                        window.location.href = r.data;
                }).catch(r => {
                    $spin.hide();
                    $.each(r.response.data.errors, (i, item) => {
                        $form.find('[name="' + i + '"]').parent().append('<div class="help-block vue-error">' + item[0] + '</div>')
                    });
                });
            },

            profileFormSubmit(e) {
                $('#sideLoader').show();
                let $form = $(e.target);
                let data = {};

                $form.serializeArray().filter(function (item) {
                    if (item.value)
                        data[item.name] = item.value;
                });

                axios.post('/api/user/update', data).then(r => {
                    this.auth = r.data;
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0"><b>' + this.auth.name + '</b>, your profile has been updated.</p></div>'
                    }).show();
                    $('#sideLoader').hide();
                    this.showModal = '';
                });
            },

            processFile(e) {
                this.avatar = e.target.files[0];

                let reader = new FileReader();
                reader.onload = (e) => {
                    console.log(e.target.result);
                    this.runtimeAvatar = e.target.result;
                };
                console.log(this.avatar);
                reader.readAsDataURL(this.avatar);
            },

            avatarFormSubmit(e) {
                $('#sideLoader').show();

                let avatar = new FormData();

                avatar.append('avatar', this.avatar);

                axios.post('/api/user/update', avatar).then(r => {
                    this.auth = r.data;
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0"><b>' + this.auth.name + '</b>, your profile picture has been updated.</p></div>'
                    }).show();
                    $('#sideLoader').hide();
                    this.showModal = '';
                });
            },

            passwordFormSubmit(e) {
                $('#sideLoader').show();
                let $form = $(e.target);
                let data = {};

                $form.serializeArray().filter(function (item) {
                    if (item.value)
                        data[item.name] = item.value;
                });

                axios.post('/api/user/update/password', data).then(r => {
                    this.auth = r.data;
                    new Noty({
                        type: 'warning',
                        text: '<div><p class="m-0"><b>' + this.auth.name + '</b>, your password has been changed.</p></div>'
                    }).show();
                    $('#sideLoader').hide();
                    this.showModal = '';
                });
            },
        }
    }

</script>
