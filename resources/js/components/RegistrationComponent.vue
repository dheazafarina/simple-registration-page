<template>
  <div>
    <!-- alert -->
    <div class="alert alert-success alert-dismissible fade show"
      role="alert"
      v-if="!error.register.errorLength && show.login">
      Success !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="alert alert-danger" role="alert" v-if="error.register.errorLength">
      <ul>
        <li v-if="hasOwnProp(error.register, 'phone') == true && error.register.phone.length > 0">
          {{ error.register.phone[0].message }}
        </li>
        <li v-if="hasOwnProp(error.register, 'first_name') == true && error.register.first_name.length > 0">
          {{ error.register.first_name[0].message }}
        </li>
        <li v-if="hasOwnProp(error.register, 'last_name') == true && error.register.last_name.length > 0">
          {{ error.register.last_name[0].message }}
        </li>
        <li v-if="hasOwnProp(error.register, 'email') == true && error.register.email.length > 0">
          {{ error.register.email[0].message }}
        </li>
      </ul>
    </div>

    <h3>Registration</h3>
    <!-- form -->
    <form>
      <fieldset :disabled="show.login">
        <div class="mt-3">
          <input type="number"
            v-model="form.phone"
            name="phone"
            class="form-control"
            placeholder="Mobile number">
        </div>
        <div class="mt-3">
          <input type="text" v-model="form.first_name"
            name="first_name"
            class="form-control"
            placeholder="First name">
        </div>
        <div class="mt-3">
          <input type="text" v-model="form.last_name"
            name="last_name"
            class="form-control"
            placeholder="Last name">
        </div>
        <div class="mt-3">
          <p>Date of Birth</p>
          <div class="row">
            <div class="col-sm">
              <select class="custom-select" id="year">
                <option selected>Year</option>
                <option value="year" v-for="years in picker.year">{{ years }}</option>
              </select>
            </div>
            <div class="col-sm">
              <select class="custom-select" id="month">
                <option selected>Month</option>
                <option value="month" v-for="months in picker.month">{{ months.name }}</option>
              </select>
            </div>
            <div class="col-sm">
              <select class="custom-select" id="date">
                <option selected>Date</option>
                <option value="date" v-for="dates in picker.date">{{ dates }}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-check form-check-inline mt-3">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="male" v-model="form.gender">
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="female" v-model="form.gender">
          <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="mt-3 form-group">
          <input type="text" v-model="form.email"
            name="email"
            class="form-control"
            placeholder="Email">
        </div>
        <div class="mt-5">
          <button type="button" class="btn btn-primary btn-block" :disabled="show.login" @click="save">Register</button>
        </div>
      </fieldset>
    </form>
    <div class="mt-4" v-if="show.login">
      <button type="button" class="btn btn-success btn-block">Login</button>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        show: {
          login: false
        },
        form: {
          phone: '',
          first_name: '',
          last_name: '',
          gender: 'male',
          email: ''
        },
        error: {
          register: {
            phone: [],
            first_name: [],
            last_name: [],
            email: [],
            errorLength: false
          }
        },
        picker: {
          year: [],
          month: [],
          date: [],
        }
      }
    },
    mounted() {
      this.year()
      this.month()
      this.date()
    },
    methods: {
      hasOwnProp: function (a, b) {
        return Object.prototype.hasOwnProperty.call(a, b);
      },
      reset () {
        this.form = {
          phone: '',
          first_name: '',
          last_name: '',
          gender: 'male',
          email: ''
        }
      },
      validationEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      },
      validation() {
        var error = {
          phone: [
            { message: ''}
          ],
          first_name: [
            { message: ''}
          ],
          last_name: [
            { message: ''}
          ],
          email: [
            { message: ''}
          ]
        };

        error.errorLength = false;

        if (this.form.phone.length < 1) {
          error.phone[0].message = 'Mobile number is required';
          error.errorLength = true;
        } else if (this.form.phone.length > 0 && this.form.phone.substr(0,2) !== '08') {
          error.phone[0].message = 'Invalid mobile number (e.g 0812xxxxxxxx)'
          error.errorLength = true
        } else {
          error.phone = [];
        }

        if (this.form.first_name.length < 1) {
          error.first_name[0].message = 'First name is required';
          error.errorLength = true;
        } else {
          error.first_name = [];
        }

        if (this.form.last_name.length < 1) {
          error.last_name[0].message = 'Last name is required';
          error.errorLength = true;
        } else {
          error.last_name = [];
        }

        if (this.form.email.length < 1) {
          error.email[0].message = 'Email is required';
          error.errorLength = true;
        } else if (this.form.email.length > 0 && !this.validationEmail(this.form.email)) {
          error.email[0].message = 'Invalid email'
          error.errorLength = true
        } else {
          error.email = [];
        }

         return error;
      },
      save() {
        this.error.register = this.validation();
        if (this.error.register.errorLength == false) {
          this.show.login = true
          this.reset()
        }
      },
      year() {
        var i = 0
        var thisYear = new Date().getFullYear()
        for (i = thisYear; i >= 1950; i-=1 ) {
          this.picker.year.push(i);
        }
      },
      month() {
        axios.get('/month')
          .then(response => this.picker.month = response.data);
      },
      date() {
        var i = 1
        for (i = 1; i <= 30; i+=1 ) {
          this.picker.date.push(i);
        }
      }
    }
  }
</script>
