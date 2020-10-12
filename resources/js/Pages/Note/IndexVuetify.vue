<template>
  <v-app>
    <v-main>
      <v-container>
        <div class="bg-orange-500 text-gray-900 font-medium p-1">
          <span class="px-2">{{ user.name }}</span>
          <inertia-link :href="'/inspire/?' + 'page=' + notes.current_page"><span class="text-gray-900 font-semibold">[i]</span></inertia-link>
        </div>

        <div class="bg-orange-100 p-2">
          <ul class="list-none pl-0">
            <li v-for="note in notes.data" :key="note.id" class="mb-2 text-sm">
              <div class="flex">
                <div class="pr-2">
                  <span class="text-gray-500">{{ note.id }}.</span>
                  <span class="text-xs">
                    [<inertia-link :href="'/count/?id=' + note.id + '&page=' + notes.current_page">
                      <v-icon x-small>mdi-plus</v-icon>
                    </inertia-link>]
                  </span>
                  <span class="text-xs cursor-pointer" @click="open(note)">[...]</span>
                </div>

                <div class="flex-1">
                  <div class="flex text-sm">
                    <div class="text-gray-900">{{ note.body }}</div>
                    <div class="text-gray-500 px-2">[{{ note.count }}]</div>
                  </div>

                  <ul v-if="note.comments.length" class="mt-1 italic text-gray-500 list-decimal">
                    <li v-for="comment in note.comments" :key="comment.id">{{ comment.body }}</li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>

          <div class="mt-4 text-cool-gray-800 text-sm">
            Page: {{ notes.current_page }}/{{ notes.last_page }}
            |
            Total: {{ notes.total }}
            |
            <span v-for="(link, index) in notes.links" :key="index">
              <inertia-link :href="link.url || ''">{{ link.label }}</inertia-link> |
            </span>
          </div>
        </div>

        <v-dialog v-model="showDialog" width="680">
          <v-card>
            <v-card-title>Note Detail</v-card-title>

            <v-divider></v-divider>

            <div class="flex text-base text-gray-900 py-3 px-8">
              <div class="text-gray-500 pr-2">{{ note.id }}</div>
              <div class="flex-1 leading-tight">{{ note.body }}</div>
            </div>

            <ul v-if="note.comments && note.comments.length" class="text-sm italic text-gray-500 px-12 py-2 list-decimal">
              <li v-for="comment in note.comments" :key="comment.id" class="leading-tight">{{ comment.body }}</li>
            </ul>
            <div v-else class="text-center text-gray-600 text-sm py-4">No comments yet.</div>

            <v-divider></v-divider>

            <div class="py-2 px-8">
              <v-textarea
                v-model="comment"
                solo
                flat
                auto-grow
                placeholder="add your comments">
              </v-textarea>
            </div>

            <v-divider></v-divider>

            <div class="flex items-center justify-end py-3 px-8">
              <v-btn outlined small class="mr-4" @click="close">cancel</v-btn>
              <v-btn color="primary" small @click="addComment">save</v-btn>
            </div>
          </v-card>
        </v-dialog>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  props: {
    user: Object,
    notes: Object
  },
  data () {
    return {
      showDialog: false,
      note: {},
      comment: ''
    }
  },
  methods: {
    open (note) {
      if (note) {
        this.note = note
      } else {
        this.note = {}
      }

      this.showDialog = true
    },
    close () {
      this.note = {}
      this.showDialog = false
    },
    addComment () {
      this.$inertia.post('/comment', {
        id: this.note.id,
        comment: this.comment
      }).then(page => {
        this.close()
      })
    }
  }
}
</script>
