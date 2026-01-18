export function useDateFormatter(locale: string = 'en-KE') {
    function format(
        date: string | number | Date | null | undefined,
        options?: Intl.DateTimeFormatOptions,
    ) {
        if (!date) return '—';

        const d = date instanceof Date ? date : new Date(date);
        if (isNaN(d.getTime())) return '—';

        return d.toLocaleDateString(locale, options);
    }

    function formatDateTime(
        date: string | number | Date | null | undefined,
        options: Intl.DateTimeFormatOptions = {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        },
    ) {
        if (!date) return '—';

        const d = date instanceof Date ? date : new Date(date);
        if (isNaN(d.getTime())) return '—';

        return d.toLocaleString(locale, options);
    }

    return {
        format,
        formatDateTime,
    };
}
