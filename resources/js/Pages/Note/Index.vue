<template>
  <div class="p-4">
    <h1 class="text-3xl mb-8">{{ user.name }} <inertia-link :href="'/inspire/?' + 'page=' + notes.current_page" > [i] </inertia-link></h1>

    <ul>
      <li v-for="note in notes.data" :key="note.id" class="pb-2 mb-2">
        {{ note.id }}
        <inertia-link :href="'/count/?id=' + note.id + '&page=' + notes.current_page">
            <v-btn x-small>[+]</v-btn>
        </inertia-link>
        <inertia-link href="/comment" method="post" :data="{ id: note.id, page: notes.current_page }">
            <v-btn x-small>[...]</v-btn>
        </inertia-link>
        {{ note.body }}
        [{{ note.count }}]
        <p v-for="comment in note.comments" :key="comment.id" class="ml-8 italic">
          {{ comment.body }}
        </p>
      </li>
    </ul>
    <div>
      Page: {{ notes.current_page }}/{{ notes.last_page }}
      |
      Total: {{ notes.total }}
      |
      <span v-for="(link, index) in notes.links" :key="index">
        <inertia-link :href="link.url || ''">{{ link.label }}</inertia-link> |
      </span>
    </div>
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
