<template>
  <div class="container--small">
    <ul class="tab">
      <li
        class="tab__item"
        :class="{'tab__item--active': tab === 1 }"
        @click="tab = 1"
      >Login</li>
      <li
        class="tab__item"
        :class="{'tab__item--active': tab === 2 }"
        @click="tab = 2"
      >Register</li>
    </ul>
    <div class="panel" v-show="tab === 1">
      <form class="form" @submit.prevent="login">
        <label for="login-email">Email</label>
        <input type="text" class="form__item" id="login-email" v-model="loginForm.email">
        <label for="login-password">Password</label>
        <input type="password" class="form__item" id="login-password" v-model="loginForm.password">
        <div class="form__button">
          <button type="submit" class="button button--inverse">login</button>
        </div>
      </form>
    </div>
    <div class="panel" v-show="tab === 2">
      <form class="form" @submit.prevent="register">
        <label for="username">Name</label>
        <input type="text" class="form__item" id="username" v-model="registerForm.name">
        <label for="email">Email</label>
        <input type="text" class="form__item" id="email" v-model="registerForm.email">
        <label for="password">Password</label>
        <input type="password" class="form__item" id="password" v-model="registerForm.password">
        <label for="password-confirmation">Password (confirm)</label>
        <input type="password" class="form__item" id="password-confirmation" v-model="registerForm.password_confirmation">
        <div class="form__button">
          <button type="submit" class="button button--inverse">register</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        tab: 1,
        loginForm: {
          email: '',
          password: '',
        },
        registerForm: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
        }
      }
    },
    methods: {
      async login () {
        await this.$store.dispatch('auth/login', this.loginForm)
        this.$router.push('/')
      },
      async register () {
        // アクションを呼び出すには dispatch メソッドを使う
        // 第一引数はアクションの名前
        // namespaced: true としたので、ストア名/アクション名で指定可能
        // 第二引数にはフォームの入力値を渡す(これがアクションの第二引数に)
        await this.$store.dispatch('auth/register', this.registerForm)

        // Promise の解決を待ってから、トップページに遷移するために pushを使う
        // router.js で Vue.use(VueRouter) としたので、$routerが使える
        this.$router.push('/')
      }
    }
  }
</script>
