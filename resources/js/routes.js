const routes = {
    auth: {
        login: {
            url: '/auth/api/login',
            method: 'post'
        },
        loginPage: {
            url: '/auth/login',
            method: 'get'
        },
        logout: {
            url: '/auth/api/logout',
            method: 'post'
        },
        register: {
            url: '/auth/api/register',
            method: 'post'
        },
        checkToken: {
            url: '/auth/api/check-token',
            method: 'post'
        }
    },
    dashboard: {
        overview: {
            url: '/dashboard/api/overview',
            method: 'get'
        },

        service: {
            list: {
                url: '/dashboard/api/services',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/services',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/services/{service}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/services/{service}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/services/{service}',
                method: 'delete'
            }
        },
        setting: {
            list: {
                url: '/dashboard/api/settings',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/settings',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/settings/{settings}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/settings/{settings}',
                method: 'put'
            },
            destroy: {
                url: '/dashboard/api/settings/{settings}',
                method: 'delete'
            }
        },
        partner: {
            list: {
                url: '/dashboard/api/partners',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/partners',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/partners/{partners}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/partners/{partners}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/partners/{partners}',
                method: 'delete'
            }
        },
        contact: {
            list: {
                url: '/dashboard/api/contacts',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/contacts',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/contacts/{contacts}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/contacts/{contacts}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/contacts/{contacts}',
                method: 'delete'
            }
        },
        feedback: {
            list: {
                url: '/dashboard/api/feedbacks',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/feedbacks',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/feedbacks/{feedbacks}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/feedbacks/{feedbacks}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/feedbacks/{feedbacks}',
                method: 'delete'
            }
        },
        coverImage: {
            list: {
                url: '/dashboard/api/cover-images',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/cover-images',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/cover-images/{coverImage}',
                method: 'get'
            },
            update: {

                url: '/dashboard/api/cover-images/{coverImage}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/cover-images/{coverImage}',
                method: 'delete'

            }
        },
        project: {
            list: {
                url: '/dashboard/api/projects',
                method: 'get'
            },
            store: {
                url: '/dashboard/api/projects',
                method: 'post'
            },
            show: {
                url: '/dashboard/api/projects/{project}',
                method: 'get'
            },
            update: {
                url: '/dashboard/api/projects/{project}',
                method: 'post'
            },
            destroy: {
                url: '/dashboard/api/projects/{project}',
                method: 'delete'
            },customers: {
                url: '/dashboard/api/projects/{projects}/customers',
                method: 'get'
            }
        },
        web:{
            project: {
                create: {
                    url: '/dashboard/projects/create',
                    method: 'get'
                },
                edit: {
                    url: '/dashboard/projects/{projects}/edit',
                    method: 'get'
                },
                customers: {
                    url: '/dashboard/projects/{projects}/customers',
                    method: 'get'
                },
            },
        }
    },
    client: {
        web: {
            service: {
                list: {
                    url: '/services',
                    method: 'get'
                },
                show: {
                    url: '/services/{service}',
                    method: 'get'
                }
            },
            coverImage: {
                list: {
                    url: '/cover-images',
                    method: 'get'
                },
                show: {
                    url: '/cover-images/{coverImages}',
                    method: 'get'

                }
            },
            project: {
                list: {
                    url: '/projects',
                    method: 'get'
                },

                show: {
                    url: '/projects/{project}',
                    method: 'get'

                },
            },
            setting: {
                list: {
                    url: '/settings',
                    method: 'get'
                },

                show: {
                    url: '/settings/{settings}',
                    method: 'get'
                },


            },
            partner: {
                list: {
                    url: '/partners',
                    method: 'get'
                },

                show: {
                    url: '/partners/{partners}',
                    method: 'get'
                },

            },
            feedback: {
                list: {
                    url: '/feedbacks',
                    method: 'get'
                },

                show: {
                    url: '/feedbacks/{feedbacks}',
                    method: 'get'
                },

            }
        },
        service: {
            list: {
                url: '/client/api/services',
                method: 'get'
            },
            show: {
                url: '/client/api/services/{service}',
                method: 'get'
            }
        },
        coverImage: {
            list: {
                url: '/client/api/cover-images',
                method: 'get'
            },
            show: {
                url: '/client/api/cover-images/{coverImages}',
                method: 'get'

            }
        },
        project: {
            list: {
                url: '/client/api/projects',
                method: 'get'
            },

            show: {
                url: '/client/api/projects/{project}',
                method: 'get'

            },

            register: {
                url: '/client/api/projects/register/{project}',
                method: 'post'
            }
        },
        setting: {
            list: {
                url: '/client/api/settings',
                method: 'get'
            },

            show: {
                url: '/client/api/settings/{settings}',
                method: 'get'
            },


        },
        partner: {
            list: {
                url: '/client/api/partners',
                method: 'get'
            },

            show: {
                url: '/client/api/partners/{partners}',
                method: 'get'
            },

        },
        feedback: {
            list: {
                url: '/client/api/feedbacks',
                method: 'get'
            },

            show: {
                url: '/client/api/feedbacks/{feedbacks}',
                method: 'get'
            },

        },
        contact: {
            url: '/client/api/contact',
            method: 'post'
        }
    }
}

export default routes
