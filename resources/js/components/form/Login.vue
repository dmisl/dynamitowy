<template>
    <div class="px-4 col-md-8 col-12 offset-2 pb-3" style="background-color: rgb(231, 231, 231);">

        <h3 class="fw-light text-primary mt-3 text-center">
            Logowanie
        </h3>
        <p class="text-dark text-center">Prosze podac email i haslo</p>

        <div class="form-item">
            <label class="small" for="email">E-mail:</label>
            <input v-model="login" v-on:keyup="validate" class="w-100 small" id="email" name="email"
                v-on:focus="clearValidation('login')" autofocus>
            <span class="">
                {{ validation.invalid.login }}
            </span>
        </div>

        <div class="form-item mt-2">
            <label class="small" for="password">Haslo:</label>
            <input v-model="pass" v-on:keyup="validatepass" class="w-100 small" id="password" name="password"
                v-on:focus="clearValidation('pass')" type="password">
            <span class="">

                {{ validation.invalid.pass }}
            </span>
        </div>

        <div class="d-flex mt-3">
            <div class="mx-auto">
                <a href="" class="small text-dark text-decoration-none d-inline-block border-end border-dark px-2">Zaloz
                    konto</a>
                <a href="" class="small text-dark text-decoration-none d-inline-block border-end border-dark px-2">Przywroc
                    dostep</a>
                <a href="" class="small text-dark text-decoration-none d-inline-block ps-2">Zmien haslo</a>
            </div>
        </div>

        <div class="mt-3 mx-auto">
            Login as <br>
            <select name="role" id="">
                <option value="1" selected>student</option>
                <option value="2">teacher</option>
                <option value="3">headmaster</option>
            </select>
        </div>

        <div class="form-item mt-2 text-center">
            <button v-if="this.validation.valid.login && this.validation.valid.pass" class="btn btn-success text-light p-0">
                <h3 class="fw-light p-2 m-0">Zaloguj sie</h3>
            </button>
        </div>

        <div class="text-center small mt-2">
            <a role="button" class="text-decoration-none">Nie wiesz jak sie zalogowac? <span
                    class="text-decoration-underline">Skorzystaj z naszych porad</span></a>
        </div>

    </div>
</template>

<script>

export default {
    data() {
        return {
            login: "",
            pass: "",
            validation: {
                invalid: {},
                valid: {}
            }

        };
    },
    methods: {
        validate: function () {
            setTimeout(() => {
                if (!this.login) {
                    this.validation.invalid.login =
                        "Pole `Login` nie może zostać pustę";
                    this.validation.valid.login = false
                } else if (!this.login.includes("@gmail.com")) {
                    this.validation.invalid.login =
                        "Login musi zawierać `@gmail.com`"
                    this.validation.valid.login = false

                } else if (!this.login.match("[A-Za-z@0-9]+")) {
                    this.validation.invalid.login =
                        "Login musi zawierać może składać się tylko latinice , cyfry i specjalny znak`@`"
                    this.validation.valid.login = false

                }
                else {
                    this.validation.valid.login = true
                    this.clearValidation("login");
                }
                this.$forceUpdate();
            }, 1500)
        },
        validatepass: function () {
            setTimeout(() => {
                if (!this.pass) {
                    this.validation.invalid.pass =
                        "Pole `Hasło` nie może zostać pustę"
                    this.validation.valid.pass = false

                }
                //  else if (this.pass.length < 8) {
                //     this.validation.invalid.pass =
                //         "Hasło nie może składać się z mniej niz 8 znaków"
                //     this.validation.valid.pass = false

                // } 
                // else if (!this.pass.match("[A-Z0-9]")) {
                //     this.validation.invalid.pass =
                //         "Hasło musi zawierać wielką literę lub cyfre"
                //     this.validation.valid.pass = false

                // }
                 else {
                    this.validation.valid.pass = true;
                    this.clearValidation("pass");
                }
                this.$forceUpdate();
            }, 1500)

        },
        clearValidation: function (field) {
            this.validation.invalid[field] = "";
            this.$forceUpdate();
        }
    }

};
</script>

<style scoped></style>
