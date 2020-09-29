<script lang="ts">
// @ts-ignore
import { gmapsMap, gmapsMarker } from "x5-gmaps";
import { iMapa, iMarker } from "../interfaces";
import { Vue, Component, Prop } from "vue-property-decorator";

@Component({ components: { gmapsMap, gmapsMarker } })
export default class SucursalesMapa extends Vue {
  @Prop({ type: Array, required: true }) readonly sucursales!: Array<any>;

  @Prop({ type: Number, required: true }) readonly centerLat!: number;
  @Prop({ type: Number, required: true }) readonly centerLng!: number;
  @Prop({ type: Number, required: false, default: 10 }) readonly zoom!: number;

  @Prop({ type: Number, required: false, default: 650 })
  readonly height!: number;

  protected markers: Array<iMarker> = [];
  protected miUbicacion: iMapa | null = null;

  protected options = {
    zoom: this.zoom,
    center: { lat: this.centerLat, lng: this.centerLng },
    zoomControl: true,
    scaleControl: false,
    mapTypeControl: false,
    backgroundColor: "#aadaff",
    fullscreenControl: false,
    streetViewControl: false,
  };

  protected markerIcon = "https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png";

  mounted() {
    let markers: Array<iMarker> = [];

    this.sucursales.forEach((sucursal) => {
      markers.push({
        icon: this.markerIcon,
        title: sucursal.nombre,
        position: {
          lat: sucursal.coordenadas.lat,
          lng: sucursal.coordenadas.lng,
        },
      });
    });

    // @ts-ignore
    this.$GMaps().then((GMaps: any) => {
      markers.forEach((marker) => {
        //Agregar Animacion
        marker.animation = GMaps.Animation.DROP;
      });
    });

    this.markers = markers;
    if (this.markers.length > 1) {
      this.fitBounds();
    }
  }

  get total() {
    return this.sucursales.length;
  }

  fitBounds() {
    // @ts-ignore
    this.$GMaps().then((GMaps: any) => {
      // @ts-ignore
      let bounds = new GMaps.LatLngBounds();

      this.markers.forEach((marker) => {
        bounds.extend(marker.position);
      });

      if (this.miUbicacion) {
        bounds.extend(this.miUbicacion);
      }

      // @ts-ignore
      this.$refs.mapa.map.fitBounds(bounds);
    });
  }

  getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        this.setLocation,
        this.locationError
      );
    } else {
      alert("Geolocation no soportada por el navegador.");
    }
  }

  setLocation(pos: any) {
    this.options = {
      ...this.options,
      center: { lat: pos.coords.latitude, lng: pos.coords.longitude },
    };
    this.miUbicacion = { lat: pos.coords.latitude, lng: pos.coords.longitude };

    this.fitBounds();
  }

  locationError(error: any) {
    if (error.PERMISSION_DENIED)
      alert("User denied the request for Geolocation.");
    else if (error.POSITION_UNAVAILABLE)
      alert("Location information is unavailable.");
    else if (error.TIMEOUT)
      alert("The request to get user location timed out.");
    else alert("An unknown error occurred.");
  }
}
</script>

<template>
  <b-card no-body border-variant="light" class="shadow-sm mb-4" :style="{ height: height + 'px'}">
    <gmaps-map ref="mapa" :options="options">
      <gmaps-marker v-for="marker in markers" :key="marker.id" :options="marker" />
      <gmaps-marker v-if="miUbicacion" :position="miUbicacion" title="Mi Ubicacion" />
    </gmaps-map>

    <b-card-footer>
      <b-row align-h="around" align-v="center">
        <b-col>
          Total de Sucursales:
          <b v-text="total"></b>
        </b-col>
        <b-col class="text-right">
          <b-btn size="sm" variant="dark" @click="getLocation">
            <i class="mdi mdi-map-marker-radius"></i>
            Mi Ubicacion
          </b-btn>
        </b-col>
      </b-row>
    </b-card-footer>
  </b-card>
</template>


<style lang="scss" scoped>
.card {
  overflow: hidden;
  position: relative;
  background: #aadaff;
}
</style>