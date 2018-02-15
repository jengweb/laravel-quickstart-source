const init = (bookingInfo) => {
    var checkInDate = bookingInfo.checkInDate,
        checkInMonthYear = bookingInfo.checkInMonthYear,
        checkOutDate = bookingInfo.checkOutDate,
        checkOutMonthYear = bookingInfo.checkOutMonthYear,
        numberOfAdults = bookingInfo.numberOfAdults,
        numberOfChildren = bookingInfo.numberOfChildren,
        numberOfRooms = bookingInfo.numberOfRooms,
        hotelCode = bookingInfo.hotelCode,
        bookingUrl = bookingInfo.bookingUrl,
        brandCode = bookingInfo.brandCode,
        localeCode = bookingInfo.localeCode;

    window.open('https://www.holidayinn.com/redirect?path=rates&brandCode='+brandCode+'&localeCode='+localeCode+'&regionCode=1&hotelCode='+hotelCode+'&checkInDate='+checkInDate+'&checkInMonthYear='+checkInMonthYear+'&checkOutDate='+checkOutDate+'&checkOutMonthYear='+checkOutMonthYear+'&numberOfAdults='+numberOfAdults+'&numberOfChildren='+numberOfChildren+'&numberOfRooms='+numberOfRooms+'&_PMID=99502222','_blank');
}
export { init }