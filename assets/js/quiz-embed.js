/**
 * Strata Fitness — Quiz Embed
 *
 * Lazy-loads the Collective quiz iframe on the Remote Coaching page.
 * Avoids inline scripts for better CSP compliance and performance.
 *
 * @package StrataFitness
 * @since   1.0.0
 */
(function () {
    'use strict';

    var widget = document.getElementById('quiz-smart-widget-a620aca2-2031-49ec-97cb-87b8306645c7');
    if (!widget) return;

    var iframe = document.createElement('iframe');
    iframe.src = 'https://quiz.thecollective.inc/q/a620aca2-2031-49ec-97cb-87b8306645c7?embed=true';
    iframe.style.width = '100%';
    iframe.style.minHeight = '800px';
    iframe.style.border = 'none';
    iframe.style.borderRadius = '12px';
    iframe.id = 'quiz-smart-frame-a620aca2-2031-49ec-97cb-87b8306645c7';
    iframe.loading = 'lazy';
    iframe.title = 'Athlete Performance Quiz';
    widget.appendChild(iframe);

    window.addEventListener('message', function (e) {
        if (e.data.type === 'quizAI:resize') {
            iframe.style.height = e.data.height + 'px';
        }
        if (
            e.data.type === 'quizAI:trackingEvent' &&
            e.source === iframe.contentWindow &&
            e.data.quizId === 'a620aca2-2031-49ec-97cb-87b8306645c7'
        ) {
            var d = e.data;
            var mp = { content_name: 'quiz_lead', value: d.value || 0, currency: 'USD' };
            if (d.hashedEmail) { mp.em = d.hashedEmail; }
            if (d.hashedPhone)  { mp.ph = d.hashedPhone; }
            if (typeof fbq === 'function') { fbq('track', 'Lead', mp, { eventID: d.eventId }); }

            var gp = { value: d.value || 0, currency: 'USD', transaction_id: d.eventId, method: 'quiz' };
            if (d.hashedEmail) { gp.sha256_email_address = d.hashedEmail; }
            if (d.hashedPhone)  { gp.sha256_phone_number = d.hashedPhone; }
            if (typeof gtag === 'function') { gtag('event', 'generate_lead', gp); }

            if (typeof ttq !== 'undefined' && ttq && typeof ttq.track === 'function') {
                if (d.hashedEmail && typeof ttq.identify === 'function') {
                    ttq.identify({ sha256_email: d.hashedEmail, sha256_phone_number: d.hashedPhone || '' });
                }
                ttq.track('SubmitForm', { value: d.value || 0, currency: 'USD', event_id: d.eventId });
            }
        }
    });
})();
