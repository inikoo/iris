
import {defineStore} from 'pinia';

export const userStore = defineStore('layout', {
    state: () => (
        {
            id: null,
            slug: null,
            type: null,
            website_id: null,
            customer_id: null,
            status: true,
            username: null,
            email: null,
            email_verified_at: null,
            auth_type: null,
            number_api_tokens: null,
            data: null,
            settings: null,
            created_at:null,
            updated_at: null,
            deleted_at: null,
            source_id: null
        }
    ),

});