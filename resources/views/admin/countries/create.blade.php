@extends('admin.layout')

@section('title','إضافة دولة')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        إضافة دولة جديدة
    </h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('admin.countries.store')}}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">اسم الدولة *</label>
                <input type="text" name="name" value="{{old('name')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: المملكة العربية السعودية" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">رمز الدولة</label>
                <input type="text" name="code" value="{{old('code')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: SA">
                <p class="text-sm text-blue-600 mt-1">💡 سيتم جلب بيانات الطقس والعاصمة تلقائياً عند إدخال رمز الدولة</p>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">الرمز البريدي</label>
                <input type="text" name="postal_code" value="{{old('postal_code')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: 11564">
                <p class="text-sm text-green-600 mt-1">🎯 يمكن استخدامه لجلب طقس أكثر دقة</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">العاصمة</label>
                <input type="text" name="capital" value="{{old('capital')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: الرياض">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">العملة *</label>
                <input type="text" name="currency" value="{{old('currency')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: ريال سعودي" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">الوصف *</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="وصف مفصل عن الدولة ومعالمها السياحية..." required>{{old('description')}}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">الميزانية اليومية *</label>
            <input type="text" name="daily_budget" value="{{old('daily_budget')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: 200-500 ريال" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">أفضل شهر للسفر</label>
                <select name="best_month_to_travel" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر الشهر</option>
                    <option value="يناير" {{ old('best_month_to_travel') == 'يناير' ? 'selected' : '' }}>يناير</option>
                    <option value="فبراير" {{ old('best_month_to_travel') == 'فبراير' ? 'selected' : '' }}>فبراير</option>
                    <option value="مارس" {{ old('best_month_to_travel') == 'مارس' ? 'selected' : '' }}>مارس</option>
                    <option value="أبريل" {{ old('best_month_to_travel') == 'أبريل' ? 'selected' : '' }}>أبريل</option>
                    <option value="مايو" {{ old('best_month_to_travel') == 'مايو' ? 'selected' : '' }}>مايو</option>
                    <option value="يونيو" {{ old('best_month_to_travel') == 'يونيو' ? 'selected' : '' }}>يونيو</option>
                    <option value="يوليو" {{ old('best_month_to_travel') == 'يوليو' ? 'selected' : '' }}>يوليو</option>
                    <option value="أغسطس" {{ old('best_month_to_travel') == 'أغسطس' ? 'selected' : '' }}>أغسطس</option>
                    <option value="سبتمبر" {{ old('best_month_to_travel') == 'سبتمبر' ? 'selected' : '' }}>سبتمبر</option>
                    <option value="أكتوبر" {{ old('best_month_to_travel') == 'أكتوبر' ? 'selected' : '' }}>أكتوبر</option>
                    <option value="نوفمبر" {{ old('best_month_to_travel') == 'نوفمبر' ? 'selected' : '' }}>نوفمبر</option>
                    <option value="ديسمبر" {{ old('best_month_to_travel') == 'ديسمبر' ? 'selected' : '' }}>ديسمبر</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">الميزانية المفضلة</label>
                <select name="preferred_budget" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر الميزانية</option>
                    <option value="أقل من 1000 دولار" {{ old('preferred_budget') == 'أقل من 1000 دولار' ? 'selected' : '' }}>أقل من 1000 دولار</option>
                    <option value="1000-5000 دولار" {{ old('preferred_budget') == '1000-5000 دولار' ? 'selected' : '' }}>1000-5000 دولار</option>
                    <option value="أكثر من 5000 دولار" {{ old('preferred_budget') == 'أكثر من 5000 دولار' ? 'selected' : '' }}>أكثر من 5000 دولار</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">أكثر ما يجذب في الوجهة</label>
                <select name="attraction" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر نوع الجذب</option>
                    <option value="أسعار منخفضة" {{ old('attraction') == 'أسعار منخفضة' ? 'selected' : '' }}>أسعار منخفضة</option>
                    <option value="أجواء ماطرة" {{ old('attraction') == 'أجواء ماطرة' ? 'selected' : '' }}>أجواء ماطرة</option>
                    <option value="مناطق سياحية مشهورة" {{ old('attraction') == 'مناطق سياحية مشهورة' ? 'selected' : '' }}>مناطق سياحية مشهورة</option>
                    <option value="فعاليات ثقافية أو رياضية" {{ old('attraction') == 'فعاليات ثقافية أو رياضية' ? 'selected' : '' }}>فعاليات ثقافية أو رياضية</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">نوع السفر</label>
                <select name="travel_with" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر نوع السفر</option>
                    <option value="بمفردي" {{ old('travel_with') == 'بمفردي' ? 'selected' : '' }}>بمفردي</option>
                    <option value="مع العائلة" {{ old('travel_with') == 'مع العائلة' ? 'selected' : '' }}>مع العائلة</option>
                    <option value="مع الأصدقاء" {{ old('travel_with') == 'مع الأصدقاء' ? 'selected' : '' }}>مع الأصدقاء</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">اللغة المفضلة</label>
            <select name="language_preference" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                <option value="">اختر اللغة</option>
                <option value="الإنجليزية" {{ old('language_preference') == 'الإنجليزية' ? 'selected' : '' }}>الإنجليزية</option>
                <option value="العربية" {{ old('language_preference') == 'العربية' ? 'selected' : '' }}>العربية</option>
                <option value="لا توجد لغة معينة" {{ old('language_preference') == 'لا توجد لغة معينة' ? 'selected' : '' }}>لا توجد لغة معينة</option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">درجة الحرارة *</label>
                <input type="text" name="temp" value="{{old('temp')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: 25°C" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">حالة الطقس *</label>
                <input type="text" name="condition" value="{{old('condition')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: مشمس" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">صورة الدولة *</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            <p class="text-sm text-gray-600 mt-1">يُفضل رفع صورة بجودة عالية (JPEG, PNG, JPG, GIF - حد أقصى 2MB)</p>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                إضافة الدولة
            </button>
            <a href="{{ route('admin.countries.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                رجوع
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const codeInput = document.querySelector('input[name="code"]');
    const postalCodeInput = document.querySelector('input[name="postal_code"]');
    const tempInput = document.querySelector('input[name="temp"]');
    const conditionInput = document.querySelector('input[name="condition"]');
    const capitalInput = document.querySelector('input[name="capital"]');
    
    if (codeInput) {
        codeInput.addEventListener('blur', function() {
            const countryCode = this.value.trim().toUpperCase();
            if (countryCode && countryCode.length === 2) {
                fetchWeatherData(countryCode);
            }
        });
    }

    // أيضاً عند تغيير الرمز البريدي إذا كان رمز الدولة موجود
    if (postalCodeInput) {
        postalCodeInput.addEventListener('blur', function() {
            const countryCode = codeInput.value.trim().toUpperCase();
            const postalCode = this.value.trim();
            if (countryCode && countryCode.length === 2 && postalCode) {
                fetchWeatherData(countryCode, postalCode);
            }
        });
    }
    
    function fetchWeatherData(countryCode, postalCode = null) {
        // عرض مؤشر التحميل
        tempInput.value = 'جاري التحميل...';
        conditionInput.value = 'جاري التحميل...';
        tempInput.disabled = true;
        conditionInput.disabled = true;
        
        const requestData = {
            country_code: countryCode
        };
        
        if (postalCode) {
            requestData.postal_code = postalCode;
        }
        
        // إرسال طلب للخادم
        fetch('/api/weather/country', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // ملء الحقول بالبيانات المستلمة
                tempInput.value = `${data.data.temperature}°C`;
                conditionInput.value = data.data.condition;
                
                // ملء حقل العاصمة إذا كان فارغاً
                if (capitalInput && !capitalInput.value) {
                    capitalInput.value = data.data.capital;
                }
                
                // عرض رسالة نجاح مع نوع الموقع المستخدم
                const locationInfo = data.data.location_used ? ` (${data.data.location_used})` : '';
                showNotification(`تم جلب بيانات الطقس بنجاح!${locationInfo}`, 'success');
            } else {
                throw new Error(data.error || 'فشل في جلب البيانات');
            }
        })
        .catch(error => {
            console.error('خطأ في جلب بيانات الطقس:', error);
            tempInput.value = '';
            conditionInput.value = '';
            
            // عرض رسالة خطأ
            showNotification('لم يتم العثور على بيانات الطقس لهذه الدولة. يرجى إدخال البيانات يدوياً.', 'error');
        })
        .finally(() => {
            // إعادة تفعيل الحقول
            tempInput.disabled = false;
            conditionInput.disabled = false;
        });
    }
    
    function showNotification(message, type) {
        // إنشاء عنصر التنبيه
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 
            'bg-red-100 border border-red-400 text-red-700'
        }`;
        notification.textContent = message;
        
        // إضافة التنبيه للصفحة
        document.body.appendChild(notification);
        
        // إزالة التنبيه بعد 5 ثوان
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 5000);
    }
});
</script>
@endsection
