<template>
  <div class="modal fade"
       :class="show ? 'show' : ''"
       id="exampleModal"
       tabindex="-1"
       aria-labelledby="exampleModalLabel"
       :aria-modal="show"
       :aria-hidden="!show"
       role="dialog"
       style="display: block"
       v-show="show" >

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="close"></button>
        </div>
        <div class="modal-body">{{message}}</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="close">Close</button>
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {onMounted, onUnmounted, watch} from "vue";

const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
  maxWidth: {
    type: String,
    default: '2xl',
  },
  closeable: {
    type: Boolean,
    default: true,
  },
  title: {
    type: String,
    default: 'Default Title Modal',
  },
  message: {
    type: String,
    default: 'Message here...',
  }
});

const emit = defineEmits(['close']);

watch(
    () => props.show,
    () => {
      if (props.show) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = null;
      }
    }
);

const close = () => {
  if (props.closeable) {
    emit('close');
  }
};

const closeOnEscape = (e) => {
  if (e.key === 'Escape' && props.show) {
    close();
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
  document.removeEventListener('keydown', closeOnEscape);
});
</script>
