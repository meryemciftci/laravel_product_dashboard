<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Giriş Başarılı. {{Auth:: user()->name}} <br/>
                    Giriş Başarılı. {{Auth:: user()->email}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- # Looking to send emails in production? Check out our Email API/SMTP product!
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=fdd7781a0759e7
MAIL_PASSWORD=aaa65594c4bdc8 -->