<script lang="ts">
import axios from "axios";
import { Vue, Component, Prop } from "vue-property-decorator";

@Component({})
export default class SuscripcionNewsletter extends Vue {
  protected email: string = "";
  protected loading: boolean = false;

  get isValid() {
    return this.email && this.loading === false;
  }

  submit(e: Event) {
    e.preventDefault();

    this.loading = true;

    axios
      .post("/api/newsletter-suscripcion", { email: this.email })
      .then((response) => {
        this.loading = false;

        this.email = "";

        this.$bvToast.toast("Se registro para recibir noticias a su correo.", {
          solid: true,
          title: `Suscripción`,
          variant: `success`,
        });
      })
      .catch((error) => {
        this.loading = false;

        this.email = "";

        this.$bvToast.toast(error, {
          solid: true,
          title: `Error`,
          variant: `danger`,
        });
      });
  }
}
</script>

<template>
  <b-form @submit="submit">
    <b-row align-v="end">
      <b-col md="10">
        <b-form-group
          label="Ingrese su email"
          label-class="text-md-center"
          autocomplete="Off"
          :disabled="loading"
        >
          <b-input-group>
            <template v-slot:prepend>
              <b-input-group-text>
                <i class="mdi mdi-email-open"></i>
              </b-input-group-text>
            </template>
            <b-form-input type="email" v-model="email" required></b-form-input>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col md="2">
        <b-form-group>
          <b-btn block :disabled="!isValid" type="submit">
            Registrar
            <i class="mdi mdi-loading mdi-spin" v-if="loading"></i>
            <i class="mdi mdi-email-send-outline" v-else></i>
          </b-btn>
        </b-form-group>
      </b-col>
    </b-row>
  </b-form>
</template>

<style lang="scss" scoped>
</style>