<template>
  <div>
    <h1 class="text-3xl">{{ user.name }}</h1>
    <ul>
      <li v-for="note in notes" :key="note.id">
        {{ note.id }} - {{ note.body }} [{{ note.count }}]
      </li>
    </ul>
  </div>
</template>

<script>

export default {
  props: {
    user: Object,
    notes: Object,
  },
}

</script>
