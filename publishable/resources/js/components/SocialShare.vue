<script lang="ts">
// @ts-ignore
import ShareNetwork from "vue-social-sharing/src/share-network";
import { Vue, Component, Prop } from "vue-property-decorator";

@Component({ components: { ShareNetwork } })
export default class SocialShare extends Vue {
  @Prop({ type: String, required: true }) readonly url!: string;
  @Prop({ type: String, required: true }) readonly title!: string;
  @Prop({ type: String, required: true }) readonly description!: string;
}
</script>

<template>
  <div class="social-share">
    <share-network network="whatsapp" :url="url" :title="title" :description="description">
      <i class="mdi mdi-whatsapp"></i>
      <span>Whatsapp</span>
    </share-network>

    <share-network network="facebook" :url="url" :title="title" :description="description">
      <i class="mdi mdi-facebook"></i>
      <span>Facebook</span>
    </share-network>

    <share-network network="twitter" :url="url" :title="title" :description="description">
      <i class="mdi mdi-twitter"></i>
      <span>Twitter</span>
    </share-network>

    <share-network network="skype" :url="url" :title="title" :description="description">
      <i class="mdi mdi-skype"></i>
      <span>Skype</span>
    </share-network>

    <share-network network="telegram" :url="url" :title="title" :description="description">
      <i class="mdi mdi-telegram"></i>
      <span>Telegram</span>
    </share-network>
  </div>
</template>

<style lang="scss" scoped>
.social-share {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: center;

  a {
    &[class^="share-network-"] {
      flex: none;
      color: #ffffff;
      cursor: pointer;
      margin: 10px 5px;
      display: flex;
      overflow: hidden;
      align-items: center;
      border-radius: 3px;
      align-content: center;
      background-color: #333;
      flex-direction: row;

      > .mdi {
        flex: 0 1 auto;
        padding: 5px 10px;
        font-size: 25px;
        line-height: 25px;
        background-color: rgba(0, 0, 0, 0.2);
      }

      > span {
        flex: 0 1 auto;
        padding: 8px 10px;
        font-size: 14px;
      }
    }

    &.share-network-twitter {
      background-color: #1da1f2;
    }
    &.share-network-facebook {
      background-color: #1877f2;
    }
    &.share-network-whatsapp {
      background-color: #25d366;
    }
    &.share-network-telegram {
      background-color: #0088cc;
    }
    &.share-network-skype {
      background-color: #00aff0;
    }
  }
}
</style>