<template>
    <div class="taginput-container is-focusable">
        <span class="tag" title="Auckland"><!---->
            <span class="has-ellipsis"> Auckland </span>
            <a role="button" aria-label="Delete this tag" class="delete is-small"></a>
        </span>
        <span class="tag" title="Wellington"><!---->
            <span class="has-ellipsis"> Wellington </span>
            <a role="button" aria-label="Delete this tag" class="delete is-small"></a>
        </span>
        <span class="tag" title="Very long string that would overflow"><!---->
            <span class="has-ellipsis"> Very long string that would overflow </span>
            <a role="button" aria-label="Delete this tag" class="delete is-small"></a>
        </span>
    </div>
</template>

<script>

export default {

}

</script>

<style>
.taginput .taginput-container >.tag {
    margin-left: 0.275rem;
    margin-bottom: calc(0.275em - 1px);
    font-size: .9em;
    height: calc(2em - 1px);
}
.tag:not(body) {
    align-items: center;
    background-color: #f5f5f5;
    border-radius: 4px;
    color: #4a4a4a;
    display: inline-flex;
    font-size: .75rem;
    height: 2em;
    justify-content: center;
    line-height: 1.5;
    padding-left: 0.75em;
    padding-right: 0.75em;
    white-space: nowrap;
}
.tag .has-ellipsis {
    max-width: 10em;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.tag:not(body) .delete {
    margin-left: 0.25rem;
    margin-right: -0.375rem;
}
.is-small.delete, .is-small.modal-close {
    height: 16px;
    max-height: 16px;
    max-width: 16px;
    min-height: 16px;
    min-width: 16px;
    width: 16px;
}

.delete {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    background-color: hsla(0,0%,4%,.2);
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    pointer-events: auto;
    display: inline-block;
    flex-grow: 0;
    flex-shrink: 0;
    font-size: 0;
    height: 20px;
    max-height: 20px;
    max-width: 20px;
    min-height: 20px;
    min-width: 20px;
    outline: none;
    position: relative;
    vertical-align: top;
    width: 20px;
}


.delete:before {
    height: 2px;
    width: 50%;
}
.delete:after {
    height: 50%;
    width: 2px;
}

.delete:after, .delete:before {
    background-color: #fff;
    content: "";
    display: block;
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translateX(-50%) translateY(-50%) rotate(45deg);
    transform-origin: center center;
}
</style>
