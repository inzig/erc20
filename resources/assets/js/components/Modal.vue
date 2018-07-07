<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container" :class="modalType">
                    <button type="button" class="close" @click="$emit('close')"><span>&times;</span></button>

                    <div class="modal-body">
                        <div class="form-signin">
                            <slot name="body">
                                default body
                            </slot>
                        </div>
                    </div>



                    <div class="spinner-container" id="vueModalSpinner">
                        <div class="spinner-frame">
                            <div class="spinner-cover"></div>
                            <div class="spinner-bar"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            modalType: {
                default: 'modal-user',
            },
        }
    }
</script>
