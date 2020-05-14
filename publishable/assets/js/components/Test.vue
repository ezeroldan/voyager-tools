<script lang="ts">
import { Vue, Component, Prop, Watch } from "vue-property-decorator";

@Component
export default class Test extends Vue {
    message: string = "Hello";

    @Prop({ type: String, required: true })
    readonly name!: string;

    get saludo(): string {
        return `${this.message} ${this.name}`;
    }
}
</script>

<template>
    <div>{{ saludo }}</div>
</template>