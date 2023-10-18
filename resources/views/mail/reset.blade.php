<table style="width: 100%;">
    <tr>
        <td>
            <div style="padding: 64px 16px;">
                <section
                    style="
						color: #1d1d1d;
						border-radius: 16px;
						width: 500px;
						max-width: 100%;
						padding: 32px;
						margin: 0 auto;
						border: 1px solid #d1d1d1;
						box-shadow: 0 0 #0000, 0 0 #0000, 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
					">
                    <h1
                        style="
							margin: 0;
							font-family: Tahoma, Verdana, Segoe, sans-serif;
							font-size: 26px;
							font-weight: 900;
							letter-spacing: normal;
							text-align: center;
						">
                        {{ __('Did you forget your password?') }}
                    </h1>
                    <p style="margin: 24px 0 18px 0; font-size: 18px; text-align: center; font-weight: 400;">
                        {{ __('No need to worry, we\'ve got you covered! Let us provide you with a new password.') }}
                    </p>
                    <a href="{{ route('views.reset.index', $data['token']) }}" target="_blank"
                        style="
							text-decoration: none;
							display: block;
							color: #fcfcfc;
							background-color: #2dd4bf;
							border-radius: 16px;
							width: max-content;
							font-weight: 900;
							font-family: Tahoma, Verdana, Segoe, sans-serif;
							font-size: 20px;
							padding: 16px 40px;
							margin: 0 auto;
						">
                        {{ __('Reset Password') }}
                    </a>
                </section>
                <p style="margin: 40px 0 0 0; font-size: 16px; text-align: center; color: #030712;">
                    {{ __('If you didn\'t request a password change, you can ignore this email.') }}
                </p>
            </div>
        </td>
    </tr>
</table>
