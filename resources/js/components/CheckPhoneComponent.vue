<template>
  <div></div>
</template>

<script>

window.addEventListener("DOMContentLoaded", () => {
  function setCursorPosition(pos, elem) {
    elem.focus()

    if (elem.setSelectionRange) {
      elem.setSelectionRange(pos, pos)
    } else if (elem.createTextRange) {
      const range = elem.createTextRange()
      range.collapse(true)
      range.moveEnd("character", pos)
      range.moveStart("character", pos)
      range.select()
    }
  }

  //  let matrix = "+7 (___) ___ ____" лучше сделать маску так, и поменять на беке
  function mask(event) {
    let matrix = "__________",
      i = 0,
      def = matrix.replace(/\D/g, ""),
      val = this.value.replace(/\D/g, "")

    if (def.length >= val.length) {
      val = def
    }

    this.value = matrix.replace(/./g, function(a) {
      return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
    })

    if (event.type === "blur") {
      if (this.value.length === 2) this.value = ""
    } else setCursorPosition(this.value.length, this)
  }

  const input = document.querySelector("#phone")
  input.addEventListener("input", mask, false)
  input.addEventListener("focus", mask, false)
  input.addEventListener("blur", mask, false)
  console.log(input.value)
})


</script>

<style scoped>
div {
  display: none;
}
</style>
