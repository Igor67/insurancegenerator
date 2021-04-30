<template>
    <div class="select"
         @click="toggle"
         :class="isSelected ? 'selected' : ''"
         :data-id="id">
        <div class="select__current">
            <input type="text"
                   :value="value.title"
                   @input="doSearch"
                   :id="id" autocomplete="off"
                   :placeholder="placeholder">
            <div class="select__points">{{ value.points ? value.points : '' }}</div>
            <div class="select__arrow">
                <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.31242 1.07993V17.9117L2.02693 12.1956C1.56321 11.7739 0.811514 11.7739 0.347792 12.1956C-0.115931 12.6173 -0.115931 13.3012 0.347792 13.7229L8.66036 21.2824C9.12408 21.7041 9.87607 21.7041 10.3395 21.2824L18.6521 13.7229C18.8839 13.5121 19 13.2356 19 12.9591C19 12.6829 18.8839 12.4065 18.6521 12.1956C18.1883 11.7739 17.4363 11.7739 16.9729 12.1956L10.6874 17.9117V1.07993C10.6874 0.483808 10.1557 0 9.49993 0C8.84412 0 8.31242 0.483538 8.31242 1.07993Z" fill="#FD6950"/>
                </svg>
            </div>
        </div>
        <ul class="select__list">
            <template v-if="list.length !== 0">
                <li class="select__item"
                    v-for="( item, index ) in list"
                    :key="index"
                    :class="item[1] == 0 ? 'disabled' : ''"
                    @click="pick( item, $event )">
                    <span class="select__item-title">{{ item[0] }}</span>
                    <span class="select__item-points">{{ item[1] == 0 ? 'ЧС' : item[1] }}</span>
                </li>
            </template>
            <template v-else>
                <li class="select__item disabled">Ничего не найдено</li>
            </template>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Select",
    props: {
        placeholder: {
            type: String,
            required: false,
            default: ''
        },
        id: {
            type: String,
            required: true
        },
        items: {
            type: Array,
            required: true
        },
        value: {
            type: Object,
            required: false,
            default: ''
        },
    },
    computed: {
        list() {
            const str = this.value.title
                .toString()
                .toLowerCase()
                .replace(/\(/g, '')
                .replace(/\)/g, '')

            const reg = new RegExp( str );

            return this.items.filter( item => {
                const strToCheck = item[0]
                    .toString()
                    .toLowerCase()
                    .replace(/\(/g, '')
                    .replace(/\)/g, '')

                return strToCheck.match( reg );
            });
        },
        isSelected() {
            return this.value.points;
        }
    },
    data() {
        return {
            $e: null,
            $list: null,
            isDropdownOpen: false
        }
    },
    methods: {
        doSearch( event ) {
            this.$emit( "input", {
                value: event.target.value,
                key: this.id,
                points: null
            });

            if ( !this.$e.classList.contains( "active" ) ) {
                this.open();
            }

            this.$e.classList.remove( "selected" );
        },
        pick( item, event ) {
            const $e         = event.target;
            const isDisabled = $e.closest( ".select__item.disabled" );

            if ( !isDisabled ) {
                this.$emit( "selected", {
                    value: item[0],
                    key: this.id,
                    points: parseInt( item[1] )
                });
            }
        },
        toggle() {
            if ( !this.isDropdownOpen ) {
                this.open();
            }

            else {
                this.hide();
            }

            this.isDropdownOpen = !this.isDropdownOpen;
        },
        open() {
            this.$e.classList.add( "active" );

            document.addEventListener( "click", this.overlayHandler );
        },
        hide() {
            this.$e.classList.remove( "active" );

            document.removeEventListener( "click", this.overlayHandler );
        },
        overlayHandler( event ) {
            if ( !event.target.closest( `.select[data-id="${this.id}"]` ) ) {
                this.toggle();
            }
        }
    },
    mounted() {
        try {
            this.$e    = document.querySelector( `.select[data-id="${this.id}"]` );
            this.$list = this.$e.querySelector( ".select__list" );
        }

        catch (e) {
            console.error( e.message );
        }
    }
}
</script>

<style lang="scss" scoped>
.select {
    position: relative;
    max-width: 480px;
    width: 100%;
    height: 75px;
    background: black;

    &.selected {
        background: red;

        .select__arrow {
            path {
                fill: #ffffff;
            }
        }
    }

    &.active {
        .select__list {
            z-index: 2;
            opacity: 1;
            transform: translateY( 0 );
            pointer-events: all;
        }

        .select__arrow {
            svg {
                transform: rotate( 180deg );
            }
        }
    }
}

.select__current {
    position: relative;
    width: 100%;
    height: 75px;
    border: 1px solid red;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    color: #FFFFFF;
    padding-left: 28px;
    z-index: 1;

    .select__arrow {
        position: absolute;
        z-index: 2;
        right: 0;
        top: 0;
        bottom: 0;
        width: 72px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;

        svg {
            transition: all .2s ease-in-out;

            path {
                transition: all .2s ease-in-out;
            }
        }

        &::before {
            content: '';
            position: absolute;
            top: 15px;
            bottom: 15px;
            width: 1px;
            background: rgba( #fff, .3 );
            left: 2px;
        }
    }

    input {
        color: #fff;
        width: 100%;
        height: 100%;
        padding-right: 150px;
        background: none;
        border: none;
        outline: none;

        &:focus {
            outline: none;
        }
    }
}

.select__points {
    position: absolute;
    top: 0;
    bottom: 0;
    display: flex;
    right: 94px;
    align-items: center;
    z-index: 2;
    background: transparent;
}

.select__list {
    position: absolute;
    z-index: -1;
    opacity: 0;
    pointer-events: none;
    transform: translateY( 10px );
    left: 0;
    right: 0;
    top: 100%;
    max-height: calc( 75px * 5 );
    overflow: auto;
    background: black;
    padding-left: 0;
    transition: all .2s ease-in-out;

    .select__item {
        width: 100%;
        background: red;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 35px 20px 28px;
        cursor: pointer;

        &.disabled {
            cursor: not-allowed;
            background: #676b71;
        }
    }
}
</style>
